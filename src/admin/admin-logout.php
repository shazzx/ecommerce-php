<?php 
session_start();
session_unset();
session_destroy();
header("location: http://localhost:100/project/src/pages/home.php");

?>