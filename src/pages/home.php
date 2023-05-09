<?php
session_start();

if(!$_SESSION["user"]["uuid"]){
    header("location: http://localhost:100/project/src/user/login.php");
}
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
            padding: 4px;
            margin-inline: auto;
            max-width: 1400px;
        }

        /* @media screen and (max-width: 880px) {
            .home-container{
                flex-direction: column;
            }
        } */

        .home-main{
            margin-top: 20px;
            max-width: 1200px;
            margin-inline: auto;
        }

        /* PRODUCTS */
        .products{
            display: flex;
            gap: 25px;
            max-width: 1100px;
            padding: 20px;
            align-items: center;
            margin-inline: auto;
            mask-image: linear-gradient(90deg, black, 90%, transparent);
            /* scrollbar-width: none; */
            overflow: scroll;
        }

        .home-categories{
            background-color: #171717;
            border-radius: 2px;
            font-family: inherit;
            max-width:fit-content;
            color: white;
            margin-left: 70px;
            margin-top: 10px;
            padding: 10px;
            cursor: pointer;
        }

        .home-categories:hover{
            background-color: crimson;
        }

        .products::-webkit-scrollbar{
            display: none;
        }

        .product{
            width: 200px;
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: 10px 15px 10px rgba(0,0,0,0,1);
            border-radius: 4px;
            transition: all 0.5s ease-in-out;
        }

        @media screen and (max-width: 600px){
            .product{
                width: 180px;
                font-size: 14px;
            }
            .product h3{
                font-size: 14px;
            }
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

        /* CATEGORIES */

        .categories{
            display: flex;
            margin-inline: auto;
            max-width: 1000px;
            overflow: scroll;
            gap: 20px;
            scrollbar-width: none;
            transition: all 0.5s ease-in-out;        
            scroll-behavior: smooth;    
        }

        .categories::-webkit-scrollbar{
            display: none;
        }

        .categories .category{
            padding: 30px 50px;
            color: white;
            transition: all 0.5s ease-in-out;            

            border-radius: 4px;
            width: 220px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            background-color: crimson;
            cursor: pointer;
        }

        .categories .category:hover{
            background-color: #171717;
        }

        .categories-container{
            margin-top: 30px;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            margin-inline: auto;
            max-width: 1050px;
        }

        .scroll-btn,
        .scroll-btn2{
            border-radius: 10px;
            background-color: crimson;
            color: white;
            cursor: pointer;
            padding: 20px;
            border: none;
        } 

        @media screen and (max-width: 600px){

            .categories .category{
                max-width: 180px;
                padding: 20px 40px;
                font-size: 16px;
                font-weight: 500;
            }
            .scroll-btn,
            .scroll-btn2{
                display: none;
            } 
}


    </style>
</head>
<body>
    <div class="home-container">
        <main class="home-main">
            <?php require_once 'slider.php' ?>
            <div class="categories-container">
                <button class="scroll-btn2"><</button>
            <div class="categories">
                <div class="category">Mobiles</div>
                <div class="category">Laptops</div>
                <div class="category">Clothes</div>
                <div class="category">Accessories</div>
                <div class="category">Tablets</div>
                <div class="category">Batteries</div>
            </div>
            <button class="scroll-btn">></button>                
            </div>

            <?php 
            $categories = ["Laptops", "Mobiles", "Tablets", "Shoes", "Clothes"];
            for($loopStop = 0; $loopStop<5;$loopStop++){
            
            ?>

<div class="home-categories"><?php echo $categories[$loopStop] ?></div>
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
        <?php } ?>
            </main>
<!-- 
        <div class="sidebar-main-container">

            <?php
            //  require_once 'sidebar.php'
              ?>
        </div> -->
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

//SCROLLBAR

let scrollbtn = document.querySelector('.scroll-btn')
let scrollbtn2 = document.querySelector('.scroll-btn2')
let categories =document.querySelector(".categories")
scrollbtn.addEventListener('click', () => {
categories.scrollLeft += 200
console.log('hello')

})

scrollbtn2.addEventListener('click', () => {
categories.scrollLeft -= 200
console.log('hello')

})
    </script>
</body>
</html>