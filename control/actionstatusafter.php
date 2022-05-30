<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM status";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "insert"){
        $data = array(
            ':status_after' => $received_data->statusAfter,
            
        );
        $query = "INSERT INTO status(status) VALUES(:status_after)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }
    if($received_data->actions == 'fetchSingle'){
        $query = "SELECT * FROM status WHERE id ='".$received_data->id."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchall();

        foreach($result as $row){
            $data['id'] = $row['id'];
            $data['status_after'] = $row['status'];
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){
        $data = array(
            ':status_after' => $received_data->statusAfter,
            ':id' => $received_data->hiddenId,
          
        );
      
        $query = "UPDATE status SET status = :status_after WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM status WHERE id ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>