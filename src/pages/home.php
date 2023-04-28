<?php

// Temporary Database Configuration
$server = "localhost";
$user = "root";
$password = "";
$dbname = "ecommerce";

$connection = new mysqli($server, $user, $password, $dbname);

$stmt = $connection->query("SELECT * FROM products");
$result = $stmt->fetch_all(MYSQLI_ASSOC);
require_once '../partials/header.php';
if(isset($_POST)){
    $req = file_get_contents("php://input");
    $data = json_decode($req, true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>

        body{
            font-family: "Poppins", sans-serif;
            width: 100%;
        }
        .home-container{
            display: flex;
            margin-inline: auto;
            max-width: 1400px;
        }

        @media screen and (max-width: 1000px) {
            .home-container{
                flex-direction: column;
            }
        }

        .home-main{
            max-width: 80%;
            margin-inline: auto;
        }
        .products{
            display: flex;
            gap: 30px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product{
            max-width: 300px;
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: 10px 15px 10px rgba(0,0,0,0,1);
            border-radius: 4px;
        }


        .product-details_top_img{
            max-width: 240px;
        }

        .product-details_top_img img{
            max-width: 100%;
        }

        .product-details_bottom{
            display: flex;
            gap: 6%;
            justify-content: center;
            align-items: center;
        }

        .product-details_bottom button{
            border: none;
            padding: 10px 15px;
            background-color: black;
            cursor: pointer;
            color: white;
        }

        .product-details_bottom button:hover{
            background-color: #171717;
        }

        /* SIDEBAR */

        .sidebar-main-container{
            width: 20%;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <div class="home-main">

        <div class="products">
            <?php 
            $num = 0;
            while($num < 40){
                $num++;
            ?>
            <div class="product">
                <div class="product_id" hidden><?php echo $result[0]["uuid"] ?></div>
                <div class="product-details">
                    <div class="product-details_top">
                        <h3 class="product-details_top_title">
                        <?php echo $result[0]["productName"] ?> 
                        </h3>
                        <div class="product-details_top_img">
                            <img src="../admin/product/<?php echo $result[0]["image"] ?> 
" alt="">
                        </div>
                    </div>
                    <div class="product-details_bottom">
                        <button class="buy-now">Buy Now</button>
                        <button type="submit" name="add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
        </div>

        <div class="sidebar-main-container">

            <?php require_once 'sidebar.php' ?>
        </div>
    </div>

    <script>
      let addToCartCount =document.querySelector('.add-to-cart_count')
let addToCart = document.getElementsByName('add-to-cart')
let productId = document.querySelectorAll('.product_id')
let buyNow = document.querySelectorAll('.buy-now')

addToCart.forEach((element, id) => {
    element.addEventListener('click', () => {
        //getting product id
    let product_id = productId[id].innerText
    //incremening cart count
        addToCartCount.innerText++ 
        //encoding data
        product_id = JSON.stringify(product_id);
        //calling add to cart function
        addToCartReq(product_id)
    })
});


async function addToCartReq(userdata){
    let res = await fetch('api/addtocartt.php', {
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

//BUY NOW

buyNow.forEach((el, i) => {
    el.addEventListener('click', () => {
        let product_id = productId[i].innerText

        buyProduct()
    })
})

async function buyProduct(){
}

    </script>
</body>
</html>