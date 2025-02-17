<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">>
    <title>Painel do Administrador</title>
</head>

<body>


    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacaoAdmin.php";
        include "../../../inc/validacao.php";
        include "../../../back-end/buscarTodasReservas.php";
        include "../../../back-end/buscarTodosAmbientes.php";
        include "../../../back-end/buscarTodasCategorias.php";
        include "../../../back-end/buscarTodosUsuarios.php";

        ?>
        <nav>
            <li><a href="cadastrarUsuario.php">Cadastrar Usuário</a></li>
            <li><a href="criarAmbiente.php">Criar Ambiente</a></li>
            <li><a href="criarCategoria.php">Criar Categoria</a></li>
            <li><a href="todosUsuarios.php">Todos Usários</a></li>
            <li><a href="todosAmbientes.php">Todos Ambientes</a></li>
            <li><a href="todasCategorias.php">Todas Categorias</a></li>
            <li><a href="../usuario/todasReservas.php">Todas Reservas</a></li>

        </nav>
    </header>

    <main>


        <div class="information">
            <div class="user">
                <i class="fa-solid fa-users"></i>
                <?php
                $todosUsuarios = count($usuarios);
                echo '<p>' . $todosUsuarios . '</p>';
                ?>
            </div>

            <div class="ambient">
                <i class="fa-solid fa-location-dot"></i>
                <?php
                $todosAmbientes = count($ambientes);
                echo '<p>' . $todosAmbientes . '</p>';
                ?>
            </div>
            <div class="category">
                <i class="fa-solid fa-list"></i>
                <?php
                $todasCategorias = count($categorias);
                echo '<p>' . $todasCategorias . '</p>';
                ?>

            </div>

            <div class="reserve">
                <i class="fa-solid fa-calendar"></i>
                <?php
                $todasReservas = count($reservas);
                echo '<p>' . $todasReservas . '</p>';
                ?>
            </div>
        </div>
    </main>

    <footer>


    </footer>


    <div></div>

</body>

</html>