<?php 
// Requiring External Files
require_once '../../../vendor/autoload.php';
use Ramsey\Uuid\Uuid;

require_once '../../partials/header.php' ;

// Temporary Database Configuration
$server = "localhost";
$user = "root";
$password = "";
$dbname = "ecommerce";

$connection = new mysqli($server, $user, $password, $dbname);

//Image Processing
function processImage(){

    $error = 0;
    $target_file = 'images/' . basename($_FILES["image"]["name"]);


    if($_FILES["image"]["size"] == 0){
        $error = 1;
        return "please select image";
    };

    if($error == 0){
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        return $target_file;
    }else{
        return "there was an error uploading your file";
    }
}

//Product Upload

if(isset($_POST["submit"])){
    
    $uuid = Uuid::uuid4();
    $productTitle = $_POST["product_title"];
    $productPrice = $_POST["price"];
    $productDescription = $_POST["description"];
    $productCategory = $_POST["category"];
    $productImage = processImage();

    function validateProductData($productTitle, $productPrice, $productDescription, $productCategory, $productImage){
        if(!empty($productTitle) && !empty($productPrice) && !empty($productDescription) && !empty($productCategory) && !empty($productImage)){
            return true;
        }
    }

    $productValidationResult = validateProductData($productTitle, $productPrice, $productDescription, $productCategory, $productImage);

    if($productValidationResult){
        function addProduct($connection, $uuid, $productTitle, $productPrice, $productDescription, $productCategory, $productImage){

            $query = "INSERT INTO products(uuid, productName, price, description, category, image) VALUES('{$uuid}', '{$productTitle}', '{$productPrice}', '{$productDescription}', '{$productCategory}', '{$productImage}')";

            $stmt = $connection->query($query);
            if($stmt){
                return true;
            }
            
        }

        $result = addProduct($connection, $uuid, $productTitle, $productPrice, $productDescription, $productCategory, $productImage);

        if($result){
            echo "Product Uploaded Successfully";
        }
    }
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
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/form.css">
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/products/products.css">


</head>
<body>
    <div class="sidebar-container">

        <?php require_once '../includes/sidebar.inc.php' ?>
        <div class="form-container">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <h3>CREATE PRODUCT</h3>
    <label for="name">Product Title</label>
        <input type="text" name="product_title" placeholder="Product title...">
        <label for="price">Price</label>
        <input type="number" name="price" placeholder="price...">
    <label for="description">Description</label>
    <textarea name="description" id="" cols="25" rows="8"></textarea>
    <label for="category">Category</label>

        <select name="category" id="">
                <option value="clothes">Clothes</option>
                <option value="shoes">Shoes</option>
                <option value="t-shirt">T-Shirt</option>
            </select>
    <label for="image">Product Image</label>
        <input type="file" name="image">
        <label for="coupen-cdoe">Coupen Code</label>
        <input type="text" name="coupen-code" placeholder="coupen code...">
        
        <div class="btn-box">
            
            
            <button type="submit" name="submit">CREATE PRODUCT</button>
        </div>
        
    </form>
</div>
</div>
</body>
</html>
<?php  
$target_file = './images/' . basename($_FILES["image"]["name"]);
if(isset($_POST["submit"])){
    $error = 0;
    if($_FILES["image"]["size"] == 0){
        $error = 1;
        die("Please Select Image");
    };

    if($error = 0){
        move_uploaded_file($_FILES["image"]["tm_name"], $target_file);
        echo "success";
    }else{
        echo "there was an error uploading your file";
    }
}

?>
