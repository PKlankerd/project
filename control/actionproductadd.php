<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

    if($received_data->actions == "fetchall")
    {
        $query ="SELECT * FROM product";
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
            ':product_code' => $received_data->productCode,
            ':product_name' => $received_data->productName,
        );
        $query = "INSERT INTO product(productcode,productname) VALUES(:product_code, :product_name)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Inserted'
        );
        echo json_encode($output);
    }
    if($received_data->actions == 'fetchSingle'){
        $query = "SELECT * FROM product WHERE productcode ='".$received_data->id."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchall();

        foreach($result as $row){
            $data['id'] = $row['productcode'];
            $data['product_code'] = $row['productcode'];
            $data['product_name'] = $row['productname'];
        }
        echo json_encode($data);  
    }

    if($received_data->actions == 'update'){
        $data = array(
            ':product_code' => $received_data->productCode,
            ':product_name' => $received_data->productName,
            ':id' => $received_data->hiddenId,
          
        );
      
        $query = "UPDATE product SET productcode = :product_code, productname = :product_name WHERE productcode = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $output = array(
            'message' => 'Data Update!!'
        );
        echo json_encode($output);
    }

    if($received_data->actions == 'delete'){
        $query = "DELETE FROM product WHERE productcode ='".$received_data->id."'";

        $statement = $connect->prepare($query);
        $statement->execute();

        $output = array(
            'message' => 'Success!!'
        );
        echo json_encode($output);
    }
?>