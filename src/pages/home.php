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

        @media screen and (max-width: 880px) {
            .home-container{
                flex-direction: column;
            }
        }

        .home-main{
            max-width: 1100px;
            margin-inline: auto;
        }
        .products{
            display: flex;
            gap: 25px;
            width: 1100px;
            padding: 20px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product{
            max-width: 260px;
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: 10px 15px 10px rgba(0,0,0,0,1);
            border-radius: 4px;
        }


        .product:hover{
            background-color: gray;
        }

        .product-category{
            background-color: crimson;
            border-radius: 20px;
            padding: 3px 8px;
            max-width: fit-content;
            font-size: 12px;
            z-index: 12;
            color: white;
        }
        .product-details_top_img{
            max-width: 240px;
            max-height: 240px;
            padding: 10px;
        }

        .product-details_top_img img{
            max-width: 100%;
            max-height: 100%;
        }

        .product-details_top_title{
            font-size: 16px;
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
            display: flex;
            margin-inline: auto;
            justify-content: center;
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <main class="home-main">

        <div class="products">
            <?php 
            for($count = 0; $count < count($result);$count++){
            ?>
            <a href="./products/product.php?id=<?php echo $result[$count]["uuid"] ?>&product-name=<?php echo join("-", explode(" ",trim(strtolower($result[$count]["productName"])))) ?>">

            <div class="product">
                <div class="product-category">
                <?php echo $result[$count]["category"] ?>
                </div>
                <div class="product_id" hidden><?php echo $result[$count]["uuid"] ?></div>
                <div class="product-details">
                    <div class="product-details_top">
                        
                        <div class="product-details_top_img">
                            <img src="../admin/product/<?php echo $result[$count]["image"] ?> 
" alt="">
                        </div>
                        <h3 class="product-details_top_title">
                        <?php echo substr($result[$count]["productName"], 0, 50) . '...' ?> 
                        </h3>
                    </div>
                    <div>
                        <?php echo $result[$count]["price"]. "$"?>
                    </div>
                    <!-- <div class="product-details_bottom">
                        <button class="buy-now">Buy Now</button>
                        <button type="submit" name="add-to-cart">Add To Cart</button>
                    </div> -->
                </div>
            </div>
            </a>

            <?php } ?>
        </div>
            </main>

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