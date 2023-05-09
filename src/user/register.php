<?php
require_once '../partials/header.php';
require_once '../../vendor/autoload.php';

use Ramsey\Uuid\Uuid;
//TEMPORARY DATABASE CONNECTION

$server = 'localhost';
$user = 'root';
$password = '';
$db_name = 'ecommerce';

$mysqlconnection = new mysqli($server, $user, $password, $db_name);

if(isset($_POST["submit"])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'user';

    //UUID GENERATION START

    $uuid = Uuid::uuid4();
    // UUID GENERATION END

    // CHECK IF USER ALREADY EXISTS

    $userCreationState = false;
    function validateUserData($uuid, $first_name, $last_name, $email, $username, $password, $role){
        if(empty($uuid) || empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($role)){
            echo 'please fill all the blanks';
            return true;
        }
    }

    if($userCreationState !== true){
        $userCreationState = validateUserData($uuid, $first_name, $last_name, $email, $username, $password, $role);
    }

    function checkUserExist($mysqlconnection, $username, $email){
        $query = "SELECT username, email FROM userss WHERE username = '{$username}' OR email = '{$email}'";
        $stmt = $mysqlconnection->query($query);
        $result = $stmt->fetch_all(MYSQLI_ASSOC);
        if($result[0]["username"] or $result[0]["email"]){
            echo "user already exist";
            return true;
        }
    }


    if($userCreationState !==true){
        $userCreationState = checkUserExist($mysqlconnection, $username, $email);
    }
    function createUser($mysqlconnection, $uuid, $first_name, $last_name, $email, $username, $password, $role){
        $query = "INSERT INTO userss(uuid, firstName, lastName, email, username, password, role) VALUE(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqlconnection->prepare($query);
        $stmt->bind_param('sssssss', $uuid, $first_name, $last_name, $email, $username, $password, $role);
        $result = $stmt->execute();
        print_r($result);
        $stmt->close();
        if($result){
            return false;
        }
    }
    if($userCreationState !==true){
        $userCreationState = createUser($mysqlconnection, $uuid, $first_name, $last_name, $email, $username, $password, $role);
    }
    
    if($userCreationState !== true){
        echo "user created";
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
    <h3>REGISTER</h3>
    <label for="name">First Name</label>
        <input type="text" name="first_name" placeholder="name...">
        <label for="name">Last Name</label>
        <input type="text" name="last_name" placeholder="name...">
    <label for="email">Email</label>
        <input type="email" name="email" placeholder="email...">
    <label for="username">Username</label>
        <input type="text" name="username" placeholder="username...">
    <label for="password">Password</label>
        <input type="password" name="password" placeholder="password...">
    
            <button type="submit" name="submit">CREATE USER</button>

            <span>already a user? <a href="http://localhost:100/project/src/user/login.php">login</a></span>
    </form>
</body>
</html>