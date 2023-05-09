<?php 
$data = json_decode(file_get_contents('php://input'), true);

//TEMPORARY DATABASE CONNECTION
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

$mysql_connect = new mysqli($server, $user, $password, $dbname);

$query = "DELETE FROM addtocart WHERE productId='{$data}'";
$result = $mysql_connect->query($query);
print_r($result);

?>