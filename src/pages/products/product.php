<?php 
require_once '../../partials/header.php';
// temporary database connection
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

$connection = new mysqli($server, $user, $password, $dbname);

$productId = $_GET["id"];
$query = "SELECT * FROM products WHERE uuid='{$productId}'";
$result = $connection->query($query);
$product = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product["productName"]?></title>
    <style>
        #main-container{
            max-width: 1200px;
            margin-inline: auto;
        }
        .product-container{
            display: flex;
            gap: 20px
        }
        .product-image{
            max-width: 400px;
        }

        .product-image img{
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div id="main-container">
        <div class="product-container">
            <div class="product-image">
                <img src="../../admin/product/<?php echo $product["image"]?>" alt="">
            </div>
            <div class="product-details">
                <h1 class="details_title"><?php echo $product["productName"] ?></h1>
                <p class="details_description"><?php echo $product["description"] ?></p>
                
            </div>
        </div>
    </div>

</body>
</html>