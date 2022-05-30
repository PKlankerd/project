<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

if($received_data->actions == "fetchall")
    {
        // $query ="SELECT * FROM bincard ORDER BY Binno ASC ";
        $query ="SELECT * FROM dipping_Lot INNER JOIN qi ON dipping_Lot.Productionlot = qi.Productionlot
        ORDER BY dipping_Lot.Productionlot ASC";
        
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
          
        

        );
        $query = "INSERT INTO qi(Productionlot)
         VALUES(:product_lot)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        
        echo json_encode($output);
    }

    if($received_data->actions == 'fetchSingle'){  
        $query = "SELECT * FROM Qi WHERE Productionlot = '".$received_data->id."' ";  

        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['Productionlot']; 
          
            // $data['bin_no'] = $row['binno']; //เอาข้อมูลจากตารางมาแสดง
            // $data['product_code'] = $row['productcode'];
            $data['product_lot'] = $row['Productionlot'];
            $data['st_status'] = $row['status1st'];
            $data['st_reject'] = $row['reject1st'];
            $data['st_good'] = $row['good1st'];
            $data['nd_status'] = $row['status2nd'];
            $data['nd_reject'] = $row['reject2nd'];
            $data['nd_good'] = $row['good2nd'];
            $data['total_qty'] = $row['Total'];
           
          
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
            ':st_status' => $received_data->stStatus,
            ':st_reject' => $received_data->stReject,
            ':st_good' => $received_data->stGood,
            ':nd_status' => $received_data->ndStatus,
            ':nd_reject' => $received_data->ndReject,
            ':nd_good' => $received_data->ndGood,
            ':total_qty' => $received_data->totalQty,
                       
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE qi SET  Productionlot = :product_lot, status1st = :st_status, 
        reject1st = :st_reject, good1st = :st_good, status2nd = :nd_status, reject2nd = :nd_reject, good2nd = :nd_good,
        Total = :total_qty WHERE Productionlot = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM qi WHERE Productionlot ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>