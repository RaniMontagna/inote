<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metatags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="INote" content="Site para você se organizar e não esquecer de mais nenhuma tarefa." />

    <!-- FaviIcon -->
    <link rel="icon" href="images/inoteLogo1.png" />

    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <title>INote | Bem-vindo!</title>
</head>

<body>
    <div class="navBar">
        <img src="images/inoteLogo1.png" alt="Logo Inote">
        <h1> Bem-vindos ao Inote, controle seu tempo! </h1>
    </div>

    <div class="content">
        <div class="title">
            <h1> Anotações</h1>
            <h2> Pessoais</h2>
        </div>
        <div class="add">
            <form action="/sendNote.php" method="post">
                <input type="text" name="note" id="note" placeholder="Adicionar uma anotação" required>
                <button type="submit">Adicionar</button>
            </form>
        </div>
        <div class="show">
        </div>
    </div>


</body>

</html>