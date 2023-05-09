<?php
session_start();
if(!$_SESSION['user']['id']){
    session_destroy();
    header("location: http://localhost:100/project/src/pages/home.php?error=unauthorized");
}

require_once 'toast.php';
$toastCount = 1;
require_once '../partials/header.php';
require_once '../config/mysqli.config.php';
$mysqlConnection = mysqlConnect();


$result = $mysqlConnection->query("SELECT * FROM userss ORDER BY id DESC");


echo "hello";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>

    <div class="main-container">
   <?php require_once './includes/sidebar.inc.php' ?>
       <div class="container">
       <div class="container_top">
       <div class="create_user">
    <a class="user_create-btn-link" href="/project/src/admin/create-user.php"><button class="user_create-btn">
        Create User
    </button></a>
       </div>
       
       <div class="search_users">
        <button>Search</button>

        <input class='user_search' type="search" name="search_users" placeholder="Search User By...">
            <select name="search_by" id="">
                <option value="id">ID</option>
                <option value="username">UID</option>
                <option value="email">EMAIL</option>
            </select>
        </div>
       </div>
    <div class="users">
    <?php 
    while($row = $result->fetch_assoc()){
    
    ?>
        <div class="user">
            <div class="user_details">
               
                    <div class="details-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtuphMb4mq-EcVWhMVT8FCkv5dqZGgvn_QiA&usqp=CAU" alt="">
                    </div>
                    <div class="details_right-main">

                    <div class="details_right">
                        <h4>User ID</h4>
                            <h4>Full Name</h4>
                            <h4>Email </h4>
                            <h4>Username</h4>
                            <h4>Role</h4>
                           

                    </div>
                    <div class="details_right">
                            <span><?php echo $row["uuid"] ?></span>
                            <span><?php echo $row["firstName"] . $row["lastName"] ?></span>
                            <span><?php echo $row["email"] ?></span>
                            <span><?php echo $row["username"] ?></span>
                            <span><?php echo $row["role"] ?></span>
                            
                    </div>
                    </div>

                    
            </div>
            <div class="user_details-btns">
                <a href="/project/src/admin/edit-user.php?id=<?php echo $row['uuid'] ?>" class="user_details-btn-link">
                    <button class="user_details-btn">
                        Edit
                    </button>
                </a>

                <a href="/project/src/admin/delete-user.php?id=<?php echo $row['uuid'] ?>" class="user_details-btn-link">
                    <button class="user_details-btn">Delete</button>
                </a>

            </div>
        </div>

        <?php 
    }
        ?>
    </div>

    
</div>
</div>

</body>

<script>
    let userSearch = document.querySelector('.user_search');
    console.log(userSearch)






    // let array = document.querySelector('.array')

    // id.forEach((id, i) => {
    //     array.innerHTML += `
    //     <form>
    //     <div>
    //     <h1>Shazz${id}</h1>
    //     <a href="?id=${id}">delete</a>
    //     </div>
    //     </form>
    //     `

    // let idItem = document.querySelectorAll('.id').forEach((id) =>{
    //     id.addEventListener('click', (e)=> {
    //         e.preventDefault();
    //         location.assign()
    //         console.log(id.innerText)
    //     })
    // })
    // })

</script>
</html>