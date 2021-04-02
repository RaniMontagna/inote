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

    // verifica se a senha confere com a informada
    if ($arr[0] == $password) {

        //pesquisa o id do usuario
        $searchId = "SELECT id FROM Usuarios WHERE nome = '$user'";
        $searchedId = pg_query($conn, $searchId);
        // recupera o valor contido na pesquisa
        $id = pg_fetch_array($searchedId, 0, PGSQL_NUM);

        session_start();
        /*session is started if you don't write this line can't use $_Session  global variable*/
        $_SESSION["idUsuario"]=$id[0];;
        $_SESSION["usuarioIncorreto"]=0;
        $_SESSION["senhaIncorreta"]=0;

        header('Location: /index.php');
    } else {
        session_start();
        /*session is started if you don't write this line can't use $_Session  global variable*/
        $keyPass = 1;
        $_SESSION["senhaIncorreta"]=$keyPass;
        $_SESSION["usuarioIncorreto"]=0;

        header('Location: /login.php');
    }
} else {
    session_start();
    /*session is started if you don't write this line can't use $_Session  global variable*/
    $keyUser = 1;
    $_SESSION["usuarioIncorreto"]=$keyUser;
    $_SESSION["senhaIncorreta"]=0;

    header('Location: /login.php');
}
?>