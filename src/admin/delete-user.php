<?php
require_once '../partials/header.php';
require_once '../config/mysqli.config.php';

$mysqlConnection = mysqlConnect();
$uid = $_GET["id"];
$query = "DELETE FROM userss WHERE uuid= ?";
$stmt = $mysqlConnection->prepare($query);
$stmt->bind_param('i', $uid);

if($stmt->execute()){
header("location: http://localhost:100/project/src/admin/admin.php");
}
?>