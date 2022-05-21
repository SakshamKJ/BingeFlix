<?php
ob_start(); //Turns on Output Buffering
session_start();

date_default_timezone_set("Asia/Kolkata");

try{
    $con = new PDO("mysql:dbname=bingeflix; host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected Successfully";
}

catch(PDOException $e){
    exit("Connection failed: " . $e->getMessage());
}

?>