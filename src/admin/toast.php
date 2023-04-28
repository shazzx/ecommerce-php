<?php 

$toastCount = 0;
$toastTitle = '';
$toastMessage = '';
$toastColor = '';
$toastActive = '';

$loginStatus = $_GET["status"];
if($loginStatus == 'login-success' && $toastCount == 0){
    $toastTitle = 'Success';
    $toastMessage = 'Logged In Successfully';
    $toastColor = 'green';
    $toastActive = 'active';
}

if($loginStatus == 'login-error' && $toastCount == 0){
    $toastTitle = 'Error';
    $toastMessage = 'Something went wrong';
    $toastColor = 'red';
    $toastActive = 'active';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #f2f2f2;
            font-family: 'Poppins', sans-serif;
        }
        .toast-container{
            position: absolute;
            right: 20px;
            top: 20px;
            gap: 5px;
            background-color: #fff;
            box-shadow: 10px 10px 5px rgba(0, 0, 0, 0, 1);
            color: black;
            padding: 20px;
            overflow: hidden;
            max-width: 240px;
            border-radius: 12px;
            transition: 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55) ease-in-out;
            transform: translateX(calc(100% + 25px));
        }

        .toast-close{
            position: absolute;
            cursor: pointer;
            right: 10px;
            top: 10px;
        }

        .toast-message{

            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .toast-container.active{
            transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55) ease-in-out;
            animation: toast 0.3s ease-in-out forwards;

        }

        .toast-container::before{
            position: absolute;
            content: '';
            left: 0;
            bottom: 0;
            height: 6px;
            width: 0;
            background-color: <?php echo $toastColor ?>;
            transition: 1s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            animation: toastBefore 1s ease-in-out forwards;
        }

        @keyframes toastBefore{
            to{
                width: 100%;
            }
        }


        @keyframes toast {
            to{
                transform: translateX(0%);
            }
        }


        .toast-text_title{
            color: <?php echo $toastColor?>;
            font-weight: 600;
        }

        .toast-text_message{
            font-size: 14px;
        }
    </style>
</head>
<body>

</form>
    <div class="toast-container  <?php echo $toastActive ?> ">
        <div class="toast-close">
x
        </div>
        <div class="toast-message">
            <span class="toast-text_title"><?php echo $toastTitle?></span>
            <span class="toast-text_message"><?php echo $toastMessage ?></span>

        </div>
    </div>

    <script>
        let toastClose = document.querySelector('.toast-close')
        let toastContainer = document.querySelector('.toast-container')

        setTimeout(() => {
            toastContainer.classList.remove('active')
        }, 2000)

        toastClose.addEventListener('click', () => {
            toastContainer.classList.remove('active')
        }) 

    </script>
</body>
</html>