<?php 

session_start();

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

$connection = new mysqli($server, $user, $password, $dbname);


if($data = json_decode(file_get_contents("php://input"), true))

    $userId = $_SESSION["id"];
    $productId = $data;

    $result = $connection->query("SELECT productId, count FROM addtocart WHERE productId = '{$productId}'");

    if(($result->num_rows > 0 && $result->num_rows < 11)){
    $updatedCount = $result->fetch_all(MYSQLI_ASSOC);
    $updatedCount = $updatedCount[0]["count"]+ 1;
    $result = $connection->query("UPDATE addtocart SET count = '{$updatedCount}' WHERE productId = '{$productId}'");
    echo json_encode("added successfully");
    }elseif($result->num_rows > 10){
        echo json_encode("cart limit reached");
    }
    
    else{
    if(!empty($userId) && !empty($productId)){
        
        $result = $connection->query("INSERT INTO addtocart(userId, productId, count) VALUES('{$userId}','{$productId}', '1')");

        echo json_encode($result);
    }else{
        echo json_encode("failure");
    }
}
?>