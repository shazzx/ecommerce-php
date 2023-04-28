<?php

require_once "../utils/constants.php";
function mysqlConnect(){
    $dbConnection = new mysqli("localhost", "root", "", "ecommerce");
    if($dbConnection){
        return $dbConnection;
    }else{
        die("Could not Connect");
    }
}