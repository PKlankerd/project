<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM glovecolor";
        $statement = $connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($received_data->actions == "insert"){
        $data = array(
            ':glove_color' => $received_data->gloveColor,
            
        );
        $query = "INSERT INTO glovecolor(color) VALUES(:glove_color)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }
    if($received_data->actions == 'fetchSingle'){
        $query = "SELECT * FROM glovecolor WHERE id ='".$received_data->id."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchall();

        foreach($result as $row){
            $data['id'] = $row['id'];
            $data['glove_color'] = $row['color'];
           
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){
        $data = array(
            ':glove_color' => $received_data->gloveColor,
            ':id' => $received_data->hiddenId,
          
        );
      
        $query = "UPDATE glovecolor SET color = :glove_color WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM glovecolor WHERE id ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>