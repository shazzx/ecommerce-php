<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'poppins',sans-serif;
            width: 100%;
        }

        .sidebar-container{
            width: 220px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
            background-color: #f2f2f2;

        }
        .categories-heading{
            background-color: black;

            color: white;
            border-right: 10px solid red;
            width: 100%;
            padding: 10px;
        }
        .sidebar-categories{
            width: 100%;
            display: flex;
            flex-direction: column;
            font-size: 18px;
            gap: 16px;
        }

        .category{
            text-decoration: none;
            padding-inline: 10px;
            color: black;
        }

        .category:hover{
            background-color: black;
            color: white;
            border-right: 5px solid red;
        }

        .category:active{
            background-color: black;
            color: white;
        }

        /* RECOMMENDED POSTS HEADING */
        .recommended-posts-heading{
            background-color: black;

            color: white;
            border-right: 10px solid red;
            width: 100%;
            padding: 10px;
        }
    </style>
<body>
    <div class="sidebar-container">
        <div class="sidebar-categories">
            <h3 class="categories-heading">Categories</h3>
            <a href="category.php?category=mobiles" class="category">Mobiles</a>
            <a href="category.php?category=laptop" class="category">Laptop</a>
            <a href="category.php?category=mobiles-accessories" class="category">Mobile Accessories</a>
            <a href="category.php?category=laptop-accessories" class="category">Laptop Accessories</a>
            <a href="category.php?category=clothes" class="category">Clothes</a>
            <a href="category.php?category=shirts" class="category">T-Shirts</a>
            <!-- <a href="">Shoes</a>
            <input id="price-range" type="range" min="100" max="1000" value="10" >
            <input id="price-input" type="number">
            <h4 class="range-output"></h4> -->
        </div>
        <div class="recommended-posts">
            <h3 class="recommended-posts-heading">Recommended</h3>
        </div>
    </div>

    <script>
        // let priceRange =document.getElementById('price-range');
        // let rangeOutput =document.querySelector('.range-output')
        // let priceInput = document.getElementById('price-input')
        // priceInput.oninput = function(){
        //     rangeOutput.innerText = this.value
        //     priceRange.value = this.value
        // }

        // priceRange.oninput = function(){
        //     rangeOutput.innerText = this.value
        // } -->
        // // priceRange.addEventListener('change', () => {
            // console.log('hello')
        // })
    </script>
</body>
</html>