<?php
require_once '../partials/header.php';
require_once '../config/mysqli.config.php';
require_once '../../vendor/autoload.php';
use Ramsey\Uuid\Uuid;

$dbConnection = mysqlConnect();

if(isset($_POST["submit"])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST["role"];

    //UUID GENERATION START

    
    $uuid = Uuid::uuid4();

    // UUID GENERATION END
    function createUser($dbConnection, $uuid, $first_name, $last_name, $email, $username, $password, $role){

         $query = "INSERT INTO userss(uuid, firstName, lastName, email, username, password, role) VALUES (?, ?, ?, ?, ? ,?, ?)";

         $stmt = $dbConnection->prepare($query);

         $stmt->bind_param('sssssss', $uuid, $first_name, $last_name, $email, $username, $password, $role);

         $stmt->execute();
         header("location: http://localhost:100/project/src/admin/admin.php");
    }

    createUser($dbConnection, $uuid, $first_name, $last_name, $email, $username, $password, $role);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/createuser.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>CREATE USER</h3>
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
    
        <div class="btn-box">
   
            <select name="role" id="">
                <option value="user">USER</option>
                <option value="moderator">MODERATOR</option>
                <option value="admin">ADMIN</option>
            </select>
        
            <button type="submit" name="submit">CREATE USER</button>
            </div>

    </form>
</body>
</html>