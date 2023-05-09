<?php 

require_once '../../partials/header.php' ;

//TEMPORARY DATABASE CONNECTION

$server = 'localhost';
$user  = 'root';
$pwd = '';
$dbname = 'ecommerce';

$mysql_connection = new mysqli($server, $user, $pwd, $dbname);

$deleteProductId = $_GET['id'];

$result = $mysql_connection->query("DELETE FROM products WHERE uuid='{$deleteProductId}'");

if($result){
    header("location: http://localhost:100/project/src/admin/product/products.php");
}else{
    echo "there was an error while deleting your product please try again later";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://localhost:100/project/src/admin/js/sidebar.js" defer></script>
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/sidebar.css">
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/products/products.css">


</head>
<body>
    <div class="sidebar-container">

        <?php require_once '../includes/sidebar.inc.php' ?>
       delete product
    </div>
</body>
</html>