<?php
$user = $_POST['user'];
$password = $_POST['password'];

if ($user == null || $password == null) {
	echo "preencha todos os campos";
} else if (strlen($password) < 8) {
	echo "informe uma senha maior que 8 caracteres";
} else {
	$conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");
	$searchUser = "SELECT nome FROM Usuarios WHERE nome = '$user'";
	$searchedUser = pg_query($conn, $searchUser);
	$rs = pg_fetch_assoc($searchedUser);

	if ($rs) {
		echo "usuario ja registrado";
	} else {
		$insert = "INSERT INTO Usuarios(nome, senha) VALUES ('$user', '$password');";
		$resultado_insert = pg_query($conn, $insert);
		pg_close($conn);
		echo "<br> dados enviados";
		// header('Location: /register.php');
	}
}
?>