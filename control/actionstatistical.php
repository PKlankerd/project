<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM dipping_Lot INNER JOIN statistical1st ON dipping_Lot.Productionlot = statistical1st.Productionlot
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
            ':st_date' => $received_data->stDate,
            ':st_shift' => $received_data->stShift,
            ':st_cripcs' => $received_data->stCripcs,
            ':st_cridef' => $received_data->stCridef,
            ':st_majpcs' => $received_data->stMajpcs,
            ':st_majdef' => $received_data->stMajdef,
            ':st_minpcs' => $received_data->stMinpcs,
            ':st_mindef' => $received_data->stMindef,
            ':st_opera' => $received_data->stOpera,
           
        

        );
        $query = "INSERT INTO statistical1st(Productionlot,Date1st,Shift1st,CriticalPcs1st,CriticalDefect1st,
        MajorPcs1st,MajorDefect1st,MinorPcs1st,MinorDefect1st,operator1st)
         VALUES(:product_lot,:st_date,:st_shift,:st_cripcs,:st_cridef,:st_majpcs,:st_majdef,:st_minpcs,:st_mindef,:st_opera)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'fetchSingle'){  
        $query = "SELECT * FROM statistical1st WHERE Productionlot = '".$received_data->id."' ";  

        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  

        foreach($result as $row){     
            $data['id'] = $row['Productionlot']; 
            $data['product_lot'] = $row['Productionlot'];
            $data['st_date'] = $row['Date1st'];
            $data['st_shift'] = $row['Shift1st'];
            $data['st_cripcs'] = $row['CriticalPcs1st'];
            $data['st_cridef'] = $row['CriticalDefect1st'];
            $data['st_majpcs'] = $row['MajorPcs1st'];
            $data['st_majdef'] = $row['MajorDefect1st'];
            $data['st_minpcs'] = $row['MinorPcs1st'];
            $data['st_mindef'] = $row['MinorDefect1st'];
            $data['st_opera'] = $row['operator1st'];
           
          
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){   
        $data = array(
          
            ':product_lot' => $received_data->productLot,
            ':st_date' => $received_data->stDate,
            ':st_shift' => $received_data->stShift,
            ':st_cripcs' => $received_data->stCripcs,
            ':st_cridef' => $received_data->stCridef,
            ':st_majpcs' => $received_data->stMajpcs,
            ':st_majdef' => $received_data->stMajdef,
            ':st_minpcs' => $received_data->stMinpcs,
            ':st_mindef' => $received_data->stMindef,
            ':st_opera' => $received_data->stOpera,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE statistical1st SET  Productionlot = :product_lot, Date1st = :st_date, 
        Shift1st = :st_shift, CriticalPcs1st = :st_cripcs, CriticalDefect1st = :st_cridef,
        MajorPcs1st = :st_majpcs, MajorDefect1st = :st_majdef, MinorPcs1st = :st_minpcs, MinorDefect1st = :st_mindef,
        operator1st = :st_opera WHERE Productionlot = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM statistical1st WHERE Productionlot ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>