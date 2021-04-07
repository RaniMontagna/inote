<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metatags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="INote" content="Site para você se organizar e não esquecer de mais nenhuma tarefa." />

    <!-- FaviIcon -->
    <link rel="icon" href="../images/inoteLogo1.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="../css/register.css">

    <title>INote | Cadastro</title>
</head>

<body>

    <div class="register">

        <img src="../images/inoteLogo2.png">

        <h1>Registre-se</h1>

        <form method="post" action="../sendRegister.php">
            <label for="user">Usuário</label>
            <input type="text" name="user" id="user" placeholder="username" required />

            <?php
            session_start();
            if (@$_SESSION['userRegistered'] == 1) {
                echo "<div class='messageError'> <p> Usuário informado ja está cadastrado no sistema! </p> </div>";
            }
            ?>

            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="1234" required />

            <?php
            if (@$_SESSION['passwordLength'] == 1) {
                echo "<div class='messageError'> <p> Informe uma senha com no mínimo 8 caracteres! </p> </div>";
            }
            ?>

            <?php
            if (@$_SESSION['registerSuccess'] == 1) {
                echo "<div class='success'> <p> Usuário cadastrado com sucesso! </p> </div>";
            }
            ?>

            <button type="submit" class="btn-grad">Registrar</button>
        </form>

        <div class="cancel">
            <a href="../headerLogin.php">Voltar a tela de login</a>
        </div>
    </div>

</body>

</html>