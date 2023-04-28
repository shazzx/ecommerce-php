<?php
require_once '../partials/header.php';
require_once './toast.php';


if(isset($_POST["submit"])){
    require_once '../config/mysqli.config.php';
    $mysqlConnection = mysqlConnect();

    $uuid = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $role = $_POST["role"];

    $query = "UPDATE userss SET firstName = '{$first_name}', lastName = '{$last_name}', email = '{$email}', username = '{$username}', role = '{$role}' WHERE uuid='{$uuid}'";
    $mysqlConnection->query($query);
    
    header('location: http://localhost:100/project/src/admin/admin.php?status=login-success');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/edituser.css">
    <script src="./js/sidebar.js" defer></script>

</head>
<body>
<?php 
require_once '../config/mysqli.config.php';
$mysqlConnection = mysqlConnect();
$uuid = $_GET["id"];
$result = $mysqlConnection->query("SELECT * FROM userss WHERE uuid='{$uuid}'");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
    ?>

    <div class="sidebar-container">
   <?php require_once './includes/sidebar.inc.php' ?>
<div class="form-container">

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h3>UPDATE USER</h3>
        <input type="hidden" name="user_id" value="<?php echo $row['uuid']; ?>">
    <label for="name">First Name</label>
        <input type="text" name="first_name" value="<?php echo $row['firstName']; ?>" placeholder="name...">
        <label for="name" >Last Name</label>
        <input type="text" name="last_name" value="<?php echo $row['lastName']; ?>" placeholder="name...">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="email...">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="username...">
    
    <!-- <label for="password">Password</label>
    <input type="password" name="password" placeholder="password...">
-->
<div class="btn-box">
    
    <select name="role" id="">
        <?php 
                if($row['role'] == 'admin'){
                    echo '<option value="user">USER</option>';
                    echo '<option value="moderator">MODERATOR</option>';
                    echo '<option value="admin" selected>ADMIN</option>';
                }elseif($row['role'] == 'moderator'){
                    echo '<option value="user">USER</option>';
                    echo '<option value="moderator" selected>MODERATOR</option>';
                    echo '<option value="admin">ADMIN</option>';
                }else{
                    echo '<option value="user" selected>USER</option>';
                    echo '<option value="moderator">MODERATOR</option>';
                    echo '<option value="admin">ADMIN</option>';
                }
                ?>
                
            </select>
        
            <button type="submit" name="submit" onclick="toastActive()">UPDATE USER</button>
            </div>

    </form>
</div>

    <?php }} ?>
</div>
<script>
        let toastContainer = document.querySelector('.toast-container')

    function toastActive(){
        toastContainer.classList.add('active')
    }
     
</script>
</body>
</html>