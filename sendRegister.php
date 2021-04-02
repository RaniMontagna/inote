<?php
$user = $_POST['user'];
$password = $_POST['password'];

if (strlen($password) < 8) {
	session_start();
	$_SESSION["passwordLength"] = 1;
	$_SESSION["userRegistered"]=0;
	$_SESSION["registerSuccess"]=0;
	header('Location: /register.php');
} else {
	$conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");
	$searchUser = "SELECT nome FROM Usuarios WHERE nome = '$user'";
	$searchedUser = pg_query($conn, $searchUser);
	$rs = pg_fetch_assoc($searchedUser);

	if ($rs) {
		session_start();
		$_SESSION["userRegistered"] = 1;
		$_SESSION["passwordLength"]=0;
		$_SESSION["registerSuccess"]=0;
		header('Location: /register.php');
	} else {
		$insert = "INSERT INTO Usuarios(nome, senha) VALUES ('$user', '$password');";
		$resultado_insert = pg_query($conn, $insert);
		pg_close($conn);

		session_start();
		$_SESSION["passwordLength"]=0;
		$_SESSION["userRegistered"]=0;

		$_SESSION["registerSuccess"]=1;

		header('Location: /register.php');
	}
}
