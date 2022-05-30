<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM shell";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "insert")
    {
        $data = array
        (
            ':shell_name' => $received_data->shellName,       
        );

        $query = "INSERT INTO shell(shell) VALUES(:shell_name)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array
        (
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'fetchSingle'){
        $query = "SELECT * FROM shell WHERE id ='".$received_data->id."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchall();
        foreach($result as $row){
            $data['id'] = $row['id'];
            $data['shell_name'] = $row['shell'];          
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){
        $data = array(
            ':shell_name' => $received_data->shellName,
            ':id' => $received_data->hiddenId,
          
        );
      
        $query = "UPDATE shell SET shell = :shell_name WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM shell WHERE id ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>