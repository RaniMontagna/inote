<?php
$note = $_POST['note'];

// conecta com o banco
$conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");

session_start();
$userId = $_SESSION['idUsuario'];

// insere a nota no banco
$insertNote = "INSERT INTO Anotacoes (anotacao,id_usuario) VALUES ('$note', '$userId')";
$insertingNote = pg_query($conn, $insertNote);

// fecha conexão
pg_close($conn);

// atualiza a pagina
header('Location: view/index.php');
?>