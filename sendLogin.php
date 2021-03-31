<?php
$user = $_POST['user'];
$password = $_POST['password'];

// conecta com o banco
$conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");
// pesquisa da senha
$searchPassword = "SELECT senha FROM Usuarios WHERE nome = '$user'";
$searchedPassword = pg_query($conn, $searchPassword);

$rs = pg_fetch_assoc($searchedPassword);
//verifica se o usuario digitado existe
if ($rs) {
    // recupera o valor contido na pesquisa
    $arr = pg_fetch_array($searchedPassword, 0, PGSQL_NUM);

    // encerra a conexão
    pg_close($conn);
    // verifica se a senha confere com a informada
    if ($arr[0] == $password) {
        header('Location: /index.php');
    } else {
        echo "<br>Senha incorreta!";
    }
} else {
    echo "<br>Usuario incorreto";
}

?>