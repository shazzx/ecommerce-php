<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLIDER</title>
    <style>
        .slider-container{
            display: flex;
            border-radius: 10px;
            margin-inline:auto;
            max-width: 1050px;
            max-height: 380px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .image-container{
            transition: all 0.6s ease-in-out;
            width: 1100px;
        }

        .image-container img{
            max-width: 1100px;
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <div class="image-container">
            <img src="https://img.freepik.com/premium-psd/gaming-laptop-sale-promotion-social-media-post_252779-759.jpg?w=1060" alt="">
        </div>
        <div class="image-container">
            <img src="https://dlcdnwebimgs.asus.com/gain/9D99F2E7-F028-4987-A73F-138C20994440/fwebp" alt="">
        </div>        <div class="image-container">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/fs/2bbcfa99737217.5ef9be3dbb9a9.jpg        
" alt="">
        </div>
        <div class="image-container">
            <img src="https://www.evetech.co.za/repository/ProductImages/intel-rtx-3080-gaming-laptops-banner-980px-v1.jpg" alt="">
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
        }, 5000)
        
    </script>
</body>
</html>