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
        }

        .sidebar-container{
            max-width: 300px;
            padding: 25px;
            background-color: #f2f2f2
        }

        .sidebar-categories{
            display: flex;
            flex-direction: column;
            font-size: 18px;
            gap: 16px;
        }

        a{
            text-decoration: none;
            color: black;
        }
    </style>
<body>
    <div class="sidebar-container">
        <div class="sidebar-categories">
            <a href="">Mobiles</a>
            <a href="">Laptop</a>
            <a href="">Mobile Accessories</a>
            <a href="">Laptop Accessories</a>
            <a href="">Clothes</a>
            <a href="">T-Shirts</a>
            <a href="">Shoes</a>
            <input id="price-range" type="range" min="100" max="1000" value="10" >
            <input id="price-input" type="number">
            <h4 class="range-output"></h4>
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