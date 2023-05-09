<?php
require_once '../partials/header.php';

session_start();

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

$connection = new mysqli($server, $user, $password, $dbname);

if(!$_SESSION['user']['uuid']){
    echo "Please Login";
}
$userId = $_SESSION["user"]['uuid'];
$query = "SELECT productId, count FROM addtocart WHERE userId='{$userId}'";
$stmt = $connection->query($query);
$result = $stmt->fetch_all(MYSQLI_ASSOC);
$array = [];
$productCount = [];
$numm = 0;

//finding products by cart ids
foreach($result as $productId => $value){
    $productId = $value["productId"];
    array_push($productCount, $value["count"]);
    $productQuery = "SELECT * FROM products WHERE uuid = '{$productId}'";
    $stmt = $connection->query($productQuery);
    $result = $stmt->fetch_all(MYSQLI_ASSOC);
    array_push($array, $result[$numm]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .addtocart-body{
        background-color: #fff;
        font-family: 'poppins', sans-serif;
    }
    .addtocart-container{
        /* position: absolute; */
        /* right: 20px; */
        max-width: 1400px;
        margin-inline: auto;
        background-color: #f2f2f2;
        padding: 20px;
        /* max-height: 100vh; */
        /* transform: translateX(calc(100% + 20px)); */
        /* overflow: scroll; */
        /* transition: all 1s cubic-bezier(0.68, -0.55, 0.265, 1.55); */
    }
/* 
    .addtocart-container.active{
        transform: translateX(0);
    } */

    .addtocart-products{
        width: 100%;
        margin-inline:auto;
    }

    .addtocart-details{
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 30px;
        width: 100%;
    }

    .addtocart-details button{
        padding: 8px;
        background-color: black;
        border: none;
        cursor: pointer;
        color: white;
        border-radius: 3px;
    }

    .addtocart-product{
        display: flex;
        align-items: center;
        gap: 20px;
        background-color: #fff;
        justify-content: center;
        border-radius: 4px;
        padding: 5px 20px;
    }

    .product_img{
        max-width: 160px;
    }

    .product_img img{
        width: 100%;
    }

    .product_details{
        width: 55%;
    }

    .product_counter{
        display: flex;
    }

    .product_counter span {
        padding: 5px;
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .removeProductBtn{
        padding: 8px;
        border-radius: 4px;
        border: none;
        color: white;
        background-color: black;
        cursor: pointer;
    }
</style>
<body class="addtocart-body">
    <div class="addtocart-container">
        <div class="addtocart-products">
            <?php 
            for($count = 0; $count<count($array);$count++){
            ?>
            <div class="addtocart-product">
                <div class="product-id" hidden><?php echo $array[$count]["uuid"] ?></div>
                <div class="product_img">
                <img src="../admin/product/<?php echo $array[$count]["image"] ?>" alt="">
                </div>
                <div class="product_details">
                    <h4 class="details_title"><?php echo $array[$count]["productName"] ?></h4>
                    <p class="details_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                </div>
                <div class="product_counter">
                    <span class="counter_decrement">-</span>
                    <span class="counter_value"><?php echo $productCount[$count] ?></span>
                    <span class="counter_increment" >+</span>
                </div>
                <button class="removeProductBtn">REMOVE</button>
            </div>
            <?php }?>
        </div>
        <div class="addtocart-details">
            <div>TOTAL <span>12,300</span></div>
            <button>CHECKOUT</button>
        </div>
    </div>

    <script>
       
// ADD TO CART

        // let showCart = document.querySelector('.list_item');
        // let addtocartContainer =document.querySelector('.addtocart-container')
        let counterValue = document.querySelectorAll('.counter_value')
        let counterDecrement = document.querySelectorAll('.counter_decrement')
        let counterIncrement = document.querySelectorAll('.counter_increment')
        let addtocartProducts = document.querySelector('.addtocart-products')

        // showCart.addEventListener('click', () => {
            // addtocartContainer.classList.toggle('active')
        // })
        let productId = document.querySelectorAll('.product-id')

        //CART PRODUCT STOCK COUNTER
        counterDecrement.forEach((el, i) => {
            el.addEventListener('click', () => {
            if(counterValue[i].innerText > 1){
                let count = --counterValue[i].innerText
                let product_id =productId[i].innerText
                let productDetails = JSON.stringify({
                    productId :product_id,
                    count,

                })

                chnageItemCount(productDetails)
            }
        })

        })

        counterIncrement.forEach((el, i) => {
            el.addEventListener('click', () => {
                if(counterValue[i].innerText < 10){
                    let count = ++counterValue[i].innerText
                let product_id =productId[i].innerText
                let productDetails = JSON.stringify({
                    productId :product_id,
                    count,
                })
                chnageItemCount(productDetails)
                }
        })
        })
       

        async function chnageItemCount(productDetails){
            let res = await fetch('api/cartCount.php',
            {
                method: "POST",
                headers: {
                    "Content-Type" : "application/json; chartset=utf-8"
                },
                body : productDetails
            }
            );
            let data = await res.json()
            console.log(data)
        }

        //REMOVE FROM CART
        let removeProductBtn = document.querySelectorAll('.removeProductBtn')
        removeProductBtn.forEach((removeBtn, i)=> {
            removeBtn.addEventListener('click', () => {
                let productId = removeBtn.parentElement.children[0].innerText
                let removeProduct =removeBtn.parentElement
                removeCartItem(productId, removeProduct)                
            })

        })

        async function removeCartItem(productId, removeProduct){
            let request = await fetch('api/deletefromcart.php', 
            {
                method: "DELETE", 
                body : JSON.stringify(productId), 
                headers : {
                    "Content-Type" : "application/json;charset=utf8"
                } })
                let response = '';
                if(await request.status == 200){
                    response = await request.json()
                    removeProduct.remove()
                }else{
                    response = 'uncaught error'
                }
        }


    </script>
</body>
</html>