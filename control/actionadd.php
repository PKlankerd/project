<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input")); 
//ตัวแปรไว้รับค่า เราจะทำการยิงข้อมูลมาจากฐานข้อมูลเพื่อส่งไปที่ frontend
$data = array();  //เก็บ array ไว้ในตัวแปร data

    if($received_data->actions == "fetchall")   
    // ส่ง $received_data ผ่าน actions ส่งมา = fetchall
    {
        $query ="SELECT * FROM employee";   //เข้าไปดึงเอาข้อมูลทั้งจากตารางฐานข้อมูล
        $statement = $connect->prepare($query);  
        //เป็นการเตรียมกัน ระหว่าง ดาต้าเบส 
        $statement->execute();  // ประมวลผล query หลังจาก prepare
       
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){ // ลูปข้อมูลทำการเก็บไปไว้ที่ data array ข้อมูลที่ fetchal
            $data[] = $row;  // row มาเก็บไว้ใน data array
        }
        echo json_encode($data);  //ส่งข้อมูล data ไปที่ frontend
    }
    
    if($received_data->actions == "calldepartment")
    {
       
        $query ="SELECT * FROM department";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }
           

    if($received_data->actions == "insert") 
    //ส่ง $received_data ผ่าน actions มาที่ insert ถ้าเกิดมันตรงกันกับ actions insert  หน้า ฟังชั่นของ vue
    {
        $data = array(   
            //  รับข้อมูลที่ส่งมาจาก insert vue มา แล้วดึงตัวแปร data array มาแล้วมาเก็บไว้ที่ array
            ':employee_number' => $received_data->employeeNumber,
            // เข้าไปเอาข้อมูลมาเก็บไว้ ผ่าน$received_data มาเก็บที่ array ':employee_number'
            ':first_name' => $received_data->firstName,
            ':last_name' => $received_data->lastName,
            ':email_address' => $received_data->emailAddress,
            ':phone_number' => $received_data->phoneNumber,
            ':local_address' => $received_data->localAddress,
            ':department_ssp' => $received_data->departMent,
        );
        $query = "INSERT INTO employee(employeeno,firstname,lastname,email,phonenumber,address,department) VALUES(:employee_number, :first_name, :last_name, :email_address, :phone_number, :local_address, :department_ssp)"; // เราเก็บอะไรทำการ insertเข้า ฐานข้อมูล หลัง values คือตัวแปรที่เราเก็บไว้ จะเอาข้อมูลไปเก็บ
        $statement = $connect->prepare($query);
        $statement->execute($data);  // ประมวลผล query หลังจาก prepare
        $output = array(          
            'message' => 'Data Inserted'   
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'fetchSingle'){    //ส่ง $received_data ผ่าน actions มาที่ fetchSingle ถ้าเกิดมันตรงกันกับ actions fetchSingle  หน้า ฟังชั่นของ vue
        $query = "SELECT * FROM employee WHERE employeeno = '".$received_data->id."' ";  
        //เข้าถึง table users จะwhere id ที่ตรงกับที่เรารับเข้ามา เข้าถึงตัวแปร$received_data เข้าถึง id
        $statement = $connect->prepare($query);
        $statement->execute($data);  // ประมวลผล query หลังจาก prepare
        $result = $statement->fetchall();  //ดึงข้อมูลมาเก็บที่ตัวแปร result

        foreach($result as $row){      // ลูปข้อมูล $result
            $data['id'] = $row['employeeno']; 
             //เก็บข้อมูลตัวแปรที่ลูปมามาเก็บไว้ที่ array ก็คือ เก็บ row มาเก็บไว้ที่ data
            $data['employee_number'] = $row['employeeno']; //เอาข้อมูลจากตารางมาแสดง
            $data['first_name'] = $row['firstname'];
            $data['last_name'] = $row['lastname'];
            $data['email_address'] = $row['email'];
            $data['phone_number'] = $row['phonenumber'];
            $data['local_address'] = $row['address'];
            $data['department_ssp'] = $row['department'];
        }
        echo json_encode($data);  
    }
    if($received_data->actions == 'update'){   // ส่ง$received_data ผ่าน actions ถ้ามันตรงกับ update
        $data = array(
            //  รับข้อมูลที่ส่งมาจาก update vue มา แล้วดึงตัวแปร data array มาแล้วมาเก็บไว้ที่ array
            ':employee_number' => $received_data->employeeNumber,
            // เข้าไปเอาข้อมูลมาเก็บไว้ ผ่าน$received_data มาเก็บที่ array ':employee_number'
            ':first_name' => $received_data->firstName,
            ':last_name' => $received_data->lastName,
            ':email_address' => $received_data->emailAddress,
            ':phone_number' => $received_data->phoneNumber,
            ':local_address' => $received_data->localAddress,
            ':department_ssp' => $received_data->departMent,
            ':id' => $received_data->hiddenId,
          
        );
        $query = "UPDATE employee SET employeeno = :employee_number, firstname = :first_name, lastname = :last_name, email = :email_address, 
        phonenumber = :phone_number, address = :local_address, department = :department_ssp,Log_Edit = NOW() WHERE employeeno = :id";  //update เข้า ฐานข้อมูล ต้อง where id = :id ด้วยเป็นการ update ต้องใส่เพื่อให้รูั้ว่าตัวไหนมันตรงกัน
        $statement = $connect->prepare($query);
        $statement->execute($data); //ประมวลผล หลัง prepare
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);  // ส่งค่าไปยัง frontend
    }

    if($received_data->actions == 'delete'){    //ส่ง$received_data ผ่าน actions ถ้ากด delete
        $query = "DELETE FROM employee WHERE employeeno ='".$received_data->id."'";
        // ก็ให้เข้าไปลบที่ตาราง users ที่ id นี้ ที่ตรงกับที่เรารับเข้ามา เข้าถึงตัวแปร$received_data เข้าถึง id
        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>