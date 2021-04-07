<?php
session_start();
$idUser = $_SESSION["idUsuario"];
$note = $_POST['note'];

echo $note;

$conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");

$searchNote = "DELETE FROM anotacoes WHERE id_usuario = '$idUser' AND anotacao = '$note'";
$searchedNote = pg_query($conn, $searchNote);

header("Location: view/index.php")

?>