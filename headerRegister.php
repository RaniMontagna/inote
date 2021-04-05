<?php 

session_start();
$_SESSION["usuarioIncorreto"]=0;
$_SESSION["senhaIncorreta"]=0;

header("Location: view/register.php")

?>