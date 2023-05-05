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

        .product-btns{
            margin-top: 40px;
        }

        .product-btns .buynow-btn, .addtocart-btn{
            padding: 6px 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 2px ;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="main-container">
        <div class="product-container">
            <div class="productId" hidden><?php echo $product["uuid"] ?></div>
            <div class="product-image">
                <img src="../../admin/product/<?php echo $product["image"]?>" alt="">
            </div>
            <div class="product-details">
                <h1 class="details_title"><?php echo $product["productName"] ?></h1>
                <p class="details_description"><?php echo $product["description"] ?></p>
                <div class="product-btns">
                <button class="buynow-btn">BUY NOW</button>
                <button class="addtocart-btn">ADD TO CART</button>
            </div>
            </div>
            
        </div>
    </div>
    <script>
        let productId = document.querySelector('.productId')
        let addtocartBtn = document.querySelector('.addtocart-btn')
        addtocartBtn.addEventListener('click', ()=>{
            addToCartReq(JSON.stringify(productId.innerText))
        })


async function addToCartReq(userdata){
    let res = await fetch('../api/addtocartt.php', {
    method : "POST", 
    headers: {
        "Content-Type" : "application/json; charset=utf-8"
    },
    body: userdata
   }).then(res => {
    if(res.status == 200){
        return res.json()
    }
   }
   )
   .then(data => {
    console.log(data)
   })
   .catch(err => {
   })

}

    </script>
</body>
</html>