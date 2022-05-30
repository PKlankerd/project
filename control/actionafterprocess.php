<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        // $query ="SELECT * FROM bincard ORDER BY Binno ASC ";

        // $query ="SELECT * FROM dipping_Lot INNER JOIN afterprocess ON dipping_Lot.Productionlot = afterprocess.Productionlot
        // ORDER BY dipping_Lot.Productionlot ASC"; //อันเดิม

        $query ="SELECT * FROM dipping_Lot
        INNER JOIN afterprocess ON dipping_Lot.Productionlot = afterprocess.Productionlot
        INNER JOIN bincard ON afterprocess.Productionlot = bincard.Productionlot
        ORDER BY dipping_Lot.Productionlot ASC";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "callproductlot")
    {
       
        $query ="SELECT * FROM dipping_Lot WHERE Productionlot like 'S%'";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "callafterprocess")
    {
       
        $query ="SELECT * FROM status where status IN ('CHLORINATED','UN-CHLORINATED')";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "calltimeshift")
    {
       
        $query ="SELECT * FROM time where timeshift IN ('AM','PM','NS')";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }



    if($received_data->actions == "insert")
    {
        $data = array(
                ':product_lot' => $received_data->productLot,

        );
        $query = "INSERT INTO afterprocess (Productionlot) VALUES(:product_lot)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        
        echo json_encode($output);
    }

     if($received_data->actions == 'fetchSingle'){  
         $query = "SELECT * FROM afterprocess WHERE Productionlot = '".$received_data->id."' ";  //อันเดิม

        // $query ="SELECT * FROM dipping_Lot
        // INNER JOIN afterprocess ON dipping_Lot.Productionlot = afterprocess.Productionlot
        // INNER JOIN bincard ON afterprocess.Productionlot = bincard.Productionlot";

        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['Productionlot']; 
            $data['product_lot'] = $row['Productionlot'];
            $data['start_ex'] = $row['StartAfter'];
            $data['finish_ex'] = $row['FinishedAfter'];
            $data['check_after'] = $row['afterprocess'];
            $data['bin_shift'] = $row['StartShift'];
            $data['bin_fhshift'] = $row['FinishedShift'];
            $data['opera_ex'] = $row['Operator'];
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){   // ส่ง$received_data ผ่าน actions ถ้ามันตรงกับ update
        $data = array(
        
            ':product_lot' => $received_data->productLot,
            ':start_ex' => $received_data->startEx,
            ':finish_ex' => $received_data->finishEx,
            ':check_after' => $received_data->checkAfter,
            ':bin_shift' => $received_data->binShift,
            ':bin_fhshift' => $received_data->binFhshift,
            ':opera_ex' => $received_data->operaEx,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE afterprocess SET  Productionlot = :product_lot, StartAfter = :start_ex,  StartShift = :bin_shift, FinishedAfter = :finish_ex, 
        FinishedShift = :bin_fhshift, afterprocess = :check_after ,Operator = :opera_ex WHERE Productionlot = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM afterprocess WHERE Productionlot ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>