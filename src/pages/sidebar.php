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
            width: 100%;
            box-shadow: 3px 4px 5px rgba(0, 0, 0, 0.1);
            padding: 25px;

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
            padding: 5px;
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
    </style>
<body>
    <div class="sidebar-container">
        <div class="sidebar-categories">
            <h3 class="categories-heading">Categories</h3>
            <a href="" class="category">Mobiles</a>
            <a href="" class="category">Laptop</a>
            <a href="" class="category">Mobile Accessories</a>
            <a href="" class="category">Laptop Accessories</a>
            <a href="" class="category">Clothes</a>
            <a href="" class="category">T-Shirts</a>
            <!-- <a href="">Shoes</a>
            <input id="price-range" type="range" min="100" max="1000" value="10" >
            <input id="price-input" type="number">
            <h4 class="range-output"></h4> -->
        </div>
    </div>

    <script>
        let priceRange =document.getElementById('price-range');
        let rangeOutput =document.querySelector('.range-output')
        let priceInput = document.getElementById('price-input')
        priceInput.oninput = function(){
            rangeOutput.innerText = this.value
            priceRange.value = this.value
        }

        priceRange.oninput = function(){
            rangeOutput.innerText = this.value
        }
        // priceRange.addEventListener('change', () => {
            // console.log('hello')
        // })
    </script>
</body>
</html>