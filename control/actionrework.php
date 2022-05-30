<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM dipping_Lot INNER JOIN rework ON dipping_Lot.Productionlot = rework.Productionlot 
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
    if($received_data->actions == "callrework")
    {
       
        $query ="SELECT * FROM processrework";
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
           //         ':re_process' => $received_data->reProcess,
    //         ':re_start' => $received_data->reStart,
    //         ':re_finish' => $received_data->reFinish,
    //         ':re_opera' => $received_data->reOpera,
    //         ':re_reason' => $received_data->reReason,
        

        );
        $query = "INSERT INTO rework(Productionlot)
         VALUES(:product_lot)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        
        echo json_encode($output);
    }
    

    if($received_data->actions == 'fetchSingle'){  
        $query = "SELECT * FROM rework WHERE Productionlot = '".$received_data->id."' ";  

        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['Productionlot']; 
          
            // $data['bin_no'] = $row['binno']; //เอาข้อมูลจากตารางมาแสดง
            // $data['product_code'] = $row['productcode'];
            $data['product_lot'] = $row['Productionlot'];
            $data['re_process'] = $row['Process'];
           
            $data['re_start'] = $row['StartRework'];
            $data['re_finish'] = $row['FinishedRework'];
            $data['re_opera'] = $row['OperatorRework'];
            $data['re_reason'] = $row['Reason'];          
          
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){   // ส่ง$received_data ผ่าน actions ถ้ามันตรงกับ update
        $data = array(
            //  รับข้อมูลที่ส่งมาจาก update vue มา แล้วดึงตัวแปร data array มาแล้วมาเก็บไว้ที่ array
            // ':bin_no' => $received_data->binNo,
            // เข้าไปเอาข้อมูลมาเก็บไว้ ผ่าน$received_data มาเก็บที่ array ':employee_number'
            // ':product_code' => $received_data->productCode,
            ':product_lot' => $received_data->productLot,
            ':re_process' => $received_data->reProcess,
           
            ':re_start' => $received_data->reStart,
            ':re_finish' => $received_data->reFinish,
            ':re_opera' => $received_data->reOpera,
            ':re_reason' => $received_data->reReason,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE rework SET  Productionlot = :product_lot, Process = :re_process, 
         StartRework = :re_start, FinishedRework = :re_finish,
        OperatorRework = :re_opera, Reason = :re_reason WHERE Productionlot = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM rework WHERE Productionlot ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>