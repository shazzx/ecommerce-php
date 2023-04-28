<?php 
require_once '../partials/header.php';
require_once '../config/mysqli.config.php';

if(isset($_POST["submit"])){
    $mysqlConnection =  mysqlConnect();
    $username = $_POST["username"];
    $password = $_POST["password"];


    $query = "SELECT * FROM userss WHERE email='{$username}' OR username='{$username}'";
    $result = $mysqlConnection->query($query);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    $password_verify = password_verify($password, $row["password"]) ;
    echo $password_verify;
    if($password_verify == 1){
        session_start();
        $_SESSION['id'] = $row['uuid'];
        header('location: http://localhost:100/project/src/admin/admin.php?status=login-success');
    }  
    else{
        header('location: ?status=login-error');
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>ADMIN LOGIN</h3>
    <label for="username">Username or email address</label>
        <input type="text" name="username" placeholder="username...">
    <label for="password">Password</label>
        <input type="password" name="password" placeholder="password...">
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>