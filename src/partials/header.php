<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:100/project/src/css/header.css">
    <style>
        .list_item{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list_item span{
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="title">
            <a href="http://localhost:100/project/src/pages/home.php">SHAZZ</a>
        </div>

        <ul class="nav_list">
            <a href="http://localhost:100/project/src/pages/home.php">
                <li>Home</li>
            </a>
            <a class="list_item" href="http://localhost:100/project/src/pages/addtocart.php">
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg><span class="add-to-cart_count" ></span></li>
            </a>
            <a href="http://localhost:100/project/src/admin/admin.php">
                <li>Admin</li>
            </a>
            <a href="http://localhost:100/project/src/pages/home.php">
                <li>Logout</li>
            </a>
        </ul>
    </nav>
    <hr>
</body>
</html>