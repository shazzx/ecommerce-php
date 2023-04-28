<?php require_once '../partials/header.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/sidebar.js" defer></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="http://localhost:100/project/src/admin/css/dashbaord.css">    

</head>
<body>
    <div class="sidebar-container">

        <?php require_once 'includes/sidebar.inc.php' ?>
        <div class="dashboard-container">
            <div class='analytics'>
                <div class="analytics_box">
                    <span>23</span>
                    <span>Orders</span>
                </div>
                <div class="analytics_box">
                    <span>123</span>
                    <span>Vendors</span>
                </div>
                <div class="analytics_box">
                    <span>1234</span>
                    <span>Users</span>
                </div>
                <div class="analytics_box">
                    <span>1313</span>
                    <span>Income</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>