<?php
session_start();
$idUser = $_SESSION["idUsuario"];


$conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");

$searchNote = "SELECT anotacao FROM anotacoes WHERE id_usuario = '$idUser'";
$searchedNote = pg_query($conn, $searchNote);


?>