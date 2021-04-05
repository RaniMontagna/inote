<?php 

session_start();
$_SESSION["passwordLength"] = 0;
$_SESSION["userRegistered"]=0;
$_SESSION["registerSuccess"]=0;

header("Location: view/login.php")

?>