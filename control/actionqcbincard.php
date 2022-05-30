<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        // $query ="SELECT * FROM bincard ORDER BY Binno ASC ";
        $query ="SELECT * FROM dipping_Lot INNER JOIN bincard ON dipping_Lot.Productionlot = bincard.Productionlot
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
       
        $query ="SELECT * FROM status where status NOT IN ('Pass','Fail')";
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
            // ':bin_no' => $received_data->binNo,
            // ':product_code' => $received_data->productCode,
            ':product_lot' => $received_data->productLot,
            // ':size_hand' => $received_data->sizeHand,
            // ':run_no' => $received_data->runNo,
            // ':start_ex' => $received_data->startEx,
            // ':finish_ex' => $received_data->finishEx,
            // ':opera_ex' => $received_data->operaEx,
            // ':check_after' => $received_data->checkAfter,
            
            // ':bin_shift' => $received_data->binShift,
            
            // ':bin_fhshift' => $received_data->binFhshift,
        

        );
        $query = "INSERT INTO bincard (Productionlot) VALUES(:product_lot)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        
        echo json_encode($output);
    }

     if($received_data->actions == 'fetchSingle'){  
        $query = "SELECT * FROM bincard WHERE Productionlot = '".$received_data->id."' ";  
        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['Productionlot']; 
            // $data['bin_no'] = $row['Binno']; //เอาข้อมูลจากตารางมาแสดง
            // $data['product_code'] = $row['Productcode'];
            $data['product_lot'] = $row['Productionlot'];
            // $data['size_hand'] = $row['size'];
            // $data['run_no'] = $row['Runno'];
            $data['start_ex'] = $row['startDate'];
            $data['finish_ex'] = $row['finishedDate'];
            // $data['opera_ex'] = $row['operator'];
            $data['check_after'] = $row['afterprocess'];
            $data['bin_shift'] = $row['startShift'];
            $data['bin_fhshift'] = $row['finishedShift'];
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update')
    {   // ส่ง$received_data ผ่าน actions ถ้ามันตรงกับ update
        $data = array(
            //  รับข้อมูลที่ส่งมาจาก update vue มา แล้วดึงตัวแปร data array มาแล้วมาเก็บไว้ที่ array
            // ':bin_no' => $received_data->binNo,
            // เข้าไปเอาข้อมูลมาเก็บไว้ ผ่าน$received_data มาเก็บที่ array ':employee_number'
            // ':product_code' => $received_data->productCode,
            ':product_lot' => $received_data->productLot,
            // ':size_hand' => $received_data->sizeHand,
            // ':run_no' => $received_data->runNo,
            ':start_ex' => $received_data->startEx,
            ':finish_ex' => $received_data->finishEx,
            // ':opera_ex' => $received_data->operaEx,
            ':check_after' => $received_data->checkAfter,
            ':bin_shift' => $received_data->binShift,
            ':bin_fhshift' => $received_data->binFhshift,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE bincard SET  Productionlot = :product_lot, startDate = :start_ex,  startShift = :bin_shift, finishedDate = :finish_ex, 
        finishedShift = :bin_fhshift, afterprocess = :check_after WHERE Productionlot = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM bincard WHERE Productionlot ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>