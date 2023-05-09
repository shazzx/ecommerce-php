<?php

session_start();
session_destroy();
unset($_SESSION['user']);
header("location : http://localhost:100/project/src/user/login.php");