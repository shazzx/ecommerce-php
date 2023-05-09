<?php
session_start();
if($_SESSION["user"]){
    header('location: http://localhost:100/project/src/pages/home.php?error=already-logged-in');
}

require_once '../partials/header.php';

//TEMPORARY DATABASE CONNECITON

$server = 'localhost';
$user = 'root';
$password = '';
$db_name = 'ecommerce';

$mysqlConnection = new mysqli($server, $user, $password, $db_name);


if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    function userExists($mysqlConnection, $email){
        $query = "SELECT * FROM userss WHERE username = '{$email}' OR email = '{$email}'";
        $stmt = $mysqlConnection->query($query);
        $result = $stmt->fetch_all(MYSQLI_ASSOC);

        if($stmt->num_rows > 0){
            $user = $result[0];

            return $user;
        }else{
            echo "you don't have an account please register";
            return true;
        }
    }
    function verify_password($password, $hashedPassword){
        $verify_password = password_verify($password, $hashedPassword);

        if($verify_password == 1){
            echo "password match";
        }else{
            return true;
        }
    }

    $userData = userExists($mysqlConnection, $email);
    if($userData !== true){
        $loginStatus = verify_password($password, $userData['password']);
    }

    function loginUser($userData){
        session_start();
        $_SESSION['user'] = $userData;
    header('location: http://localhost:100/project/src/pages/home.php?status=success');
    }

    if($loginStatus !== true){
        loginUser($userData);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="../admin/css/form.css">
    <link rel="stylesheet" href="../admin/css/createuser.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>LOGIN</h3>
    <label for="email">Username/Email</label>
        <input type="text" name="email" placeholder="username or email...">
    <label for="password">Password</label>
        <input type="password" name="password" placeholder="password...">
    
            <button type="submit" name="submit">Login</button>

            <span>dont't have an account? <a href="http://localhost:100/project/src/user/register.php">register</a></span>
    </form>
</body>
</html>