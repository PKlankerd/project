
<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM bonding ORDER BY bondingLotNo ASC";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }
    if($received_data->actions == "callproductdata")
    {
        $query ="SELECT * FROM product where productcode like '58%' ";
        
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
    if($received_data->actions == "callshell")
    {
       
        $query ="SELECT * FROM shell";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "callglovecolor")

    {
    $query ="SELECT * FROM glovecolor";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
    }

    if($received_data->actions == "callsize")
    {
    $query ="SELECT * FROM size";
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
            ':bond_no' => $received_data->bondNo,
            ':product_code' => $received_data->productCode,
            ':size_no' => $received_data->sizeNo,
            ':shell_band' => $received_data->shellBand,
            ':Liner_bnn' => $received_data->linerBnn,
            ':quan_tity' => $received_data->quanTity,
            ':product_date' => $received_data->productDate,
            
            ':record_by' => $received_data->recordBy,
            ':qua_lity' => $received_data->quaLity,
            ':inspec_date' => $received_data->inspecDate,
            
            ':inspec_by' => $received_data->inspecBy,
            ':juliandate' => $received_data->julianDate,
           
        

        );
        $query = "INSERT INTO bonding(bondingLotNo,productcode,size,shell,Liner,Quantity,ProductionDate,RecordedBy,
        Quality,InspectionDate,InspectionBy,julianDate)
         VALUES(:bond_no, :product_code, :size_no, :shell_band, :Liner_bnn, :quan_tity, :product_date, 
         :record_by, :qua_lity, :inspec_date,  :inspec_by, :juliandate)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'fetchSingle'){  
        $query = "SELECT * FROM bonding WHERE bondingLotNo = '".$received_data->id."' and ProductionDate ='".$received_data->productDate."' ";  

        $statement = $connect->prepare($query);
        $statement->execute($data);  
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['bondingLotNo']; 
            $data['bond_no'] = $row['bondingLotNo']; //เอาข้อมูลจากตารางมาแสดง
            $data['product_code'] = $row['productcode'];
            $data['size_no'] = $row['size'];
            $data['shell_band'] = $row['shell'];
            $data['Liner_bnn'] = $row['Liner'];
            $data['quan_tity'] = $row['Quantity'];
            $data['product_date'] = $row['ProductionDate'];
           
            $data['record_by'] = $row['RecordedBy'];
            $data['qua_lity'] = $row['Quality'];
            $data['inspec_date'] = $row['InspectionDate'];
           
            $data['inspec_by'] = $row['InspectionBy'];
            $data['juliandate'] = $row['JulianDate'];
           
          
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){   // ส่ง$received_data ผ่าน actions ถ้ามันตรงกับ update
        $data = array(
            //  รับข้อมูลที่ส่งมาจาก update vue มา แล้วดึงตัวแปร data array มาแล้วมาเก็บไว้ที่ array
            ':bond_no' => $received_data->bondNo,
            ':product_code' => $received_data->productCode,
            ':size_no' => $received_data->sizeNo,
            ':shell_band' => $received_data->shellBand,
            ':Liner_bnn' => $received_data->linerBnn,
            ':quan_tity' => $received_data->quanTity,
            ':product_date' => $received_data-> productDate,
            
            ':record_by' => $received_data->recordBy,
            ':qua_lity' => $received_data->quaLity,
            ':inspec_date' => $received_data->inspecDate,
            
            ':inspec_by' => $received_data->inspecBy,
            ':juliandate' => $received_data->julianDate,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE bonding SET bondingLotNo = :bond_no, productcode = :product_code, size = :size_no, shell = :shell_band, 
        Liner = :Liner_bnn, Quantity = :quan_tity, ProductionDate = :product_date,  RecordedBy = :record_by, Quality = :qua_lity, InspectionDate = :inspec_date, 
        InspectionBy = :inspec_by , julianDate = :juliandate WHERE bondingLotNo = :id and ProductionDate = :product_date";
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM bonding WHERE bondingLotNo ='".$received_data->id."' and ProductionDate ='".$received_data->productDate."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>