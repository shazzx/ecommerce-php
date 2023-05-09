<?php 

require_once '../../partials/header.php' ;

//TEMPORARY DATABASE CONNECTION

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

$mysql_connection = new mysqli($server, $user, $password, $dbname);

$stmt = $mysql_connection->query("SELECT * FROM products");
$result = $stmt->fetch_all(MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/users.css">
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/products/products.css">
    <style>
        .products-body{
            width: 100%;
        }
        .products{
            width: 100%;
        }

        body{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background-color: #eaeaea;
    margin-inline: auto;
    max-width: 1200px;
}
.main-container{
    display: flex;
    justify-content: space-between;
}

/* CONTAINER */
.container{

    margin-inline: auto;
    width: 90%;
}

.container_top {
    display: flex;
    justify-content: space-between;
}
/* USERS SEARCH */

.search_users{
    display: flex;
    justify-content: flex-end;
    margin: 20px 0 20px 0;
}

.search_users input{
    padding: 8px;
}

.search_users select, button{
    cursor: pointer;
    padding: 8px;
    border: none;
    background-color: black;
    color: white;
}

/* USERS CONTAINER */
.users{
    background-color: white;
    margin-inline: auto;
    width: 100%;
    max-height: 550px;
    overflow: scroll;
}

.user{
    background-color: white;
    padding: 10px;
    margin-inline: auto;
    max-width: 60%;
    max-height: 100%;
}

.user_details{
    display: flex;
    gap: 10px;
    align-items: center;
}

.details_right-main{
    display: flex;
    gap: 10px;
}

.details_right{
    display: flex;

    flex-direction: column;
}

.details_right h4{

    font-weight: 600;
}

.details-img{
    max-width: 100px;
    height: auto;
}

.details-img img{
    width: 100%;
}


.details_name{
    display: flex;
}

.user_details-btn{
    border: none;
    background-color: black;
    color: white;
    padding: 6px;
    width: 100%;
    cursor: pointer;
}

.user_details-btn-link{
        width: 20%;
        margin: none;
        border: none;
        background-color: black;
}

.create_user{
    display: flex;
    justify-content: right;
    margin-top: 6px;
    padding: 10px;
}

.user_create-btn{
    border: none;
    background-color: black;
    padding: 14px 20px ;
    border-radius: 4px;
    color: white;
    cursor: pointer;
}

.user_create-btn-link{
        border: none;
        background-color: transparent;
}


.user_details-btn-link:hover, .user_details-btn:hover{
    background-color: rgb(29, 27, 27);
}

.user_details-btns {
    margin-top: 10px;
    justify-content: flex-end;
    display: flex;
    gap: 10px;
}

@media screen and (max-width: 700px) {

    .user{
        max-width: 100%;
        margin: none;
    }
}

@media screen and (max-width: 580px) {
    .user{
        max-width: 100%;
        margin: none;
    }
    
    .user_details{
        flex-direction: column;
    }
    .user_details-btn-link{
        width: 30%;
    }
    .details-img {
        max-width: 150px;
    }
    .user_details-btns {
        justify-content: center;
    }
}

@media screen and (max-width: 550px){
    .user{
        font-size: 15px;
    }

   
}
    </style>


</head>
<body>
    <div class="sidebar-container">

        <?php require_once '../includes/sidebar.inc.php' ?>
        <div class="products-body">
            <div class="add-product">
                <a href="http://localhost:100/project/src/admin/product/create-product.php">
                    <button class="add-product-btn" >Add Product</button>
                </a>
            </div>

            <div class="products">
            <?php 
            $count = 0;
            while($count < count($result)){
                $row = $result[$count];
                $count++
            ?>
            <div class="user">
            <div class="user_details">
               
                    <div class="details-img">
                        <img src="<?php echo $row["image"] ?>" alt="">
                    </div>
                    <div class="details_right-main">

                    <div class="details_right">
                        <h4>Product Id</h4>
                            <h4>Product Name</h4>
                            <h4>Description</h4>
                            <h4>Price</h4>
                           

                    </div>
                    <div class="details_right">
                            <span><?php echo substr($row["uuid"], 0, 18). '...' ?></span>
                            <span><?php echo substr($row["productName"], 0, 18). '...' ?></span>
                            <span><?php echo substr($row["description"], 0, 18). '...' ?></span>
                            <span><?php echo $row["price"] ?></span>

                            
                    </div>
                    </div>

                    
            </div>
            <div class="user_details-btns">
                <a href="/project/src/admin/product/edit-product.php?id=<?php echo $row['uuid'] ?>" class="user_details-btn-link">
                    <button class="user_details-btn">
                        Edit
                    </button>
                </a>

                <a href="/project/src/admin/product/delete-product.php?id=<?php echo $row['uuid'] ?>" class="user_details-btn-link delete-product">
                    <button class="user_details-btn">Delete</button>
                </a>

            </div>
        </div>
        <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>