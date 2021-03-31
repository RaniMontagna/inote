<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metatags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="INote" content="Site para você se organizar e não esquecer de mais nenhuma tarefa." />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="/css/register.css">
    
    <!-- JS -->
    <link rel="stylesheet" type="text/javascript" href="/js/validationForm.js">

    <title>INote | Cadastro</title>
</head>

<body>

    <div class="register">

        <img src="./images/inoteLogo2.png">

        <h1>Registre-se</h1>

        <form method="post" action="/sendRegister.php" onsubmit="return validarRegister();">
            <label for="user">Usuário</label>
            <input type="text" name="user" id="user" placeholder="username" required />

            <class class="userAlready" id="userAlready" style="display: none">
                <p>Esse nome de usuário ja existe.</p>
            </class>

            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="1234" required />

            <button type="submit" class="btn-grad">Registrar</button>
        </form>

        <div class="cancel">
            <a href="/login.php">Voltar a tela de login</a>
        </div>
    </div>

</body>

</html>