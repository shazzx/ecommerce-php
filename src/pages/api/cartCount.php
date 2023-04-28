<?php 

//TEMPORARY DATABASE CONNECTION
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

$connection = new mysqli($server, $user, $password, $dbname);
//CONNECTION END

$data = json_decode(file_get_contents("php://input"), true);
$productId = $data["productId"];
$productCount = $data["count"];

$result = $connection->query("UPDATE addtocart SET count = '{$productCount}' WHERE productId = '{$productId}'");

echo json_encode($result);
?>