<?php
    include 'connection.php';

    $category = "SELECT * FROM category";
  $categoryTable = mysqli_query($con,$category);

   $select = "SELECT * FROM products";
   $selectquery = mysqli_query($con,$select);

?>




<!DOCTYPE html>
<html>
<head>
	<title>eShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>
<body>
    <nav>
    <div class="logo">
        eShop
    </div>
	
    <ul id="navUl">
		<li><a href="index.php">Products <i class="fa-solid fa-caret-down"></i></a>
        <ul>
            <li><a href="#">Categories <i class="fa-solid fa-caret-down"></i></a>
                <ul>
                <?php
                while($c = mysqli_fetch_array($categoryTable)){?>
                  <li><a href="display.php?cid=<?php echo $c['cid'] ?>"><?php echo $c['cname'] ?></a></li>
                  <?php } ?>
                </ul>
            </li>
        </ul>
        </li>
		<li><a href="addproduct.php">Add Products</a></li>
		<li><a href="editpage.php"  class="active">Update Products</a></li>
        <div class="cross"><i class="fa-solid fa-xmark"></i></div>
	</ul>

    <div class="cart">
        <a href="#">
        <button type="button" id="cartBtn" class="btn btn-transparent position-relative me-3 mt-2">
            <i class="fa-solid fa-cart-shopping"></i>

              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="badge">
                0
                <span class="visually-hidden">unread messages</span>
              </span>
        </button>
        </a>
    </div>
    
    <div class="hum"><i class="fa-solid fa-bars"></i></div>
	</nav>
    


	<main class="container">

        <h2>SELECT PRODUCT FOR EDIT</h2>
		<section class="featured row" id="dynamicRow">




            <!-- //////////// dynamic Cards///// -->
            <?php
                   while($display = mysqli_fetch_array($selectquery)){
                    
            ?>
            <div class = "flex my-3 col-sm-6 col-md-4">

                <div class="product-card">
                    
                    <img src="<?php echo $display['image'] ?>">
                    <h3><?php echo $display['tittle'] ?></h3>
                    <p class="pp"><?php echo $display['description'] ?></p>
                    <h5>Price</h5>
                    <p><?php echo   $display['price'] ?>$ <span><s>150$</s></span> </p>
                    
                  <a class="button" href="editproduct.php?id=<?php echo $display['id'] ?>"> Edit Product </a>
                  <a class="button" href="dltproduct.php?id=<?php echo $display['id'] ?>"> Delete Product </a>
                </div>
			</div>
            <?php
                };
            ?>
            <!-- //////////// dynamic Cards End///// -->








		</section>
		
    </main>

</body>
