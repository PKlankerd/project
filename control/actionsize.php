<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();


    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM size";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }

        echo json_encode($data);
    }

    if($received_data->actions == "insert"){
        $data = array(
            ':glove_size' => $received_data->gloveSize,
            
        );
        $query = "INSERT INTO size(size) VALUES(:glove_size)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }
    if($received_data->actions == 'fetchSingle'){
        $query = "SELECT * FROM size WHERE id ='".$received_data->id."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchall();

        foreach($result as $row){
            $data['id'] = $row['id'];
            $data['glove_size'] = $row['size'];
           
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){
        $data = array(
            ':glove_size' => $received_data->gloveSize,
            ':id' => $received_data->hiddenId,
          
        );
      
        $query = "UPDATE size SET size = :glove_size WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM size WHERE id ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>