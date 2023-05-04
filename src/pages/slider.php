<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .slider-container{
            display: flex;
            max-width: 600px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .image-container{
            transition: all 0.6s ease-in-out;
            width: 600px;
        }

        .image-container img{
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c2hvZXN8ZW58MHx8MHx8&w=1000&q=80" alt="">
        </div>
        <div class="image-container">
            <img src="https://rukminim1.flixcart.com/image/612/612/xif0q/shoe/t/6/w/9-vs-9500-9-world-wear-footwear-white-original-imagn6a5fqbncryj.jpeg?q=70" alt="">
        </div>
        <div class="image-container">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c2hvZXN8ZW58MHx8MHx8&w=1000&q=80" alt="">
        </div>
        <div class="image-container">
            <img src="https://rukminim1.flixcart.com/image/612/612/xif0q/shoe/t/6/w/9-vs-9500-9-world-wear-footwear-white-original-imagn6a5fqbncryj.jpeg?q=70" alt="">
        </div>
        
    </div>
    <script>
        let imageContainer = document.querySelectorAll('.image-container')
        let counter = 1;

        setInterval(()=> {

            imageContainer.forEach((image, i) => {
                let translateX = counter * 100 
                    image.style.transform = `translateX(-${translateX}%)`
                })
                counter++
                if(counter==imageContainer.length){
                    counter = 0
                }
        }, 6000)
        
    </script>
</body>
</html>