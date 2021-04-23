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
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <title>INote | Bem-vindo!</title>
</head>

<body>
    <div class="navBar">
        <div>
            <img src="../images/inoteLogo1.png" alt="Logo Inote">
            <h1> Bem-vindos ao Inote, controle seu tempo! </h1>
        </div>

        <?php
        session_start();
        if (@$_SESSION["idUsuario"] == 0) {
            echo "<a href='./login.php' class='btn-grad'>Faça seu login</a>";
        } else {
            echo "<a href='../logout.php' class='btn-grad'>Logout</a>";
        }
        ?>
    </div>

    <div class="content">
        <div class="title">
            <h1> Anotações</h1>
            <h2> Pessoais</h2>
        </div>
        <div class="add">
            <form action="../sendNote.php" method="post">
                <?php
                if (@$_SESSION["idUsuario"] == 0) {
                    echo "<input type='text' name='note' id='note' placeholder='Adicionar uma anotação' disabled>";
                    echo "<button type='submit' disabled>Adicionar</button>";
                } else {
                    echo "<input type='text' name='note' id='note' placeholder='Adicionar uma anotação' required>";
                    echo "<button type='submit'>Adicionar</button>";
                }
                ?>
            </form>
        </div>
        <div class="show">
            <?php
            if (@$_SESSION["idUsuario"] == 0) {
            } else {
                $idUsuario = $_SESSION["idUsuario"];
                //Abre conexão
                $conn = pg_connect("host=inotedb.cub6ic7io8sv.sa-east-1.rds.amazonaws.com port=5432 dbname=inotedb user=postgres password=xelos1064");
                // Faz a pesquisa
                $searchNotes = "SELECT anotacao FROM anotacoes WHERE id_usuario = '$idUsuario'";
                $searchedNotes = pg_query($conn, $searchNotes);

                //pegar quantidade de anotações
                $allNotes = pg_fetch_all($searchedNotes);
                $size = sizeof($allNotes);

                //array das notas
                $arr = @pg_fetch_array($searchedNotes, 1, PGSQL_NUM);
            }
            ?>
            <table>
                <tr>
                    <th class="anotacoes">Anotações</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php for ($i = 0; $i < $size; $i++) {
                    $arr = pg_fetch_array($searchedNotes, $i, PGSQL_NUM); ?>
                    <tr>
                        <td class="note"><?php echo "$arr[0]" ?></td>
                        <form method="post" action="../deleteNote.php">
                            <input type='hidden' name='note' value='<?php echo "$arr[0]" ?>'>
                            <td><button class="actions" type="submit">Excluir</button></td>
                        </form>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!-- onclick="window.location.href = '../deleteNote.php' -->



</body>

</html>