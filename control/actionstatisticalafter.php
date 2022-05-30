<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM dipping_Lot INNER JOIN statisticalafter ON dipping_Lot.Productionlot = statisticalafter.Productionlot
        ORDER BY dipping_Lot.Productionlot ASC";
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
    if($received_data->actions == "callstatus")
    {
       
        $query ="SELECT * FROM status where status NOT IN ('NON-AFTER PROCESS','CHLORINATED','UN-CHLORINATED')";
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

    if($received_data->actions == "insert")
    {
        $data = array(
           
            ':product_lot' => $received_data->productLot,
            ':af_date' => $received_data->afDate,
            ':af_shift' => $received_data->afShift,
            ':af_cripcs' => $received_data->afCripcs,
            ':af_cridef' => $received_data->afCridef,
            ':af_majpcs' => $received_data->afMajpcs,
            ':af_majdef' => $received_data->afMajdef,
            ':af_minpcs' => $received_data->afMinpcs,
            ':af_mindef' => $received_data->afMindef,
            ':af_status' => $received_data->afStatus,
            ':af_opera' => $received_data->afOpera,
        

        );
        $query = "INSERT INTO statisticalafter(Productionlot,DateAfter,ShiftAfter,CriticalPcsAfter,CriticalDefectAfter,
        MajorPcsAfter,MajorDefectAfter,MinorPcsAfter,MinorDefectAfter,statusAfter,operatorAfter)
         VALUES(:product_lot,:af_date,:af_shift,:af_cripcs,:af_cridef,:af_majpcs,:af_majdef,:af_minpcs,:af_mindef,:af_status,:af_opera)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        
        echo json_encode($output);
    }


    if($received_data->actions == 'fetchSingle'){  
        $query = "SELECT * FROM statisticalafter WHERE Productionlot = '".$received_data->id."' ";  

        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['Productionlot']; 
          
            // $data['bin_no'] = $row['binno']; //เอาข้อมูลจากตารางมาแสดง
            // $data['product_code'] = $row['productcode'];
            $data['product_lot'] = $row['Productionlot'];
            $data['af_date'] = $row['DateAfter'];
            $data['af_shift'] = $row['ShiftAfter'];
            $data['af_cripcs'] = $row['CriticalPcsAfter'];
            $data['af_cridef'] = $row['CriticalDefectAfter'];
            $data['af_majpcs'] = $row['MajorPcsAfter'];
            $data['af_majdef'] = $row['MajorDefectAfter'];
            $data['af_minpcs'] = $row['MinorPcsAfter'];
            $data['af_mindef'] = $row['MinorDefectAfter'];
            $data['af_status'] = $row['statusAfter'];
            $data['af_opera'] = $row['operatorAfter'];
           
          
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
            ':af_date' => $received_data->afDate,
            ':af_shift' => $received_data->afShift,
            ':af_cripcs' => $received_data->afCripcs,
            ':af_cridef' => $received_data->afCridef,
            ':af_majpcs' => $received_data->afMajpcs,
            ':af_majdef' => $received_data->afMajdef,
            ':af_minpcs' => $received_data->afMinpcs,
            ':af_mindef' => $received_data->afMindef,
            ':af_status' => $received_data->afStatus,
            ':af_opera' => $received_data->afOpera,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE statisticalafter SET Productionlot = :product_lot, DateAfter = :af_date, 
        ShiftAfter = :af_shift, CriticalPcsAfter = :af_cripcs, 	CriticalDefectAfter	 = :af_cridef,
        MajorPcsAfter = :af_majpcs, MajorDefectAfter = :af_majdef, MinorPcsAfter = :af_minpcs, MinorDefectAfter = :af_mindef,
        statusAfter = :af_status, operatorAfter = :af_opera WHERE Productionlot = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM statisticalafter WHERE Productionlot ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>