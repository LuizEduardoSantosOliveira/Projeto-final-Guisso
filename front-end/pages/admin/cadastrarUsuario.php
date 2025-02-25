<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Login</title>
</head>

<header>
    <?php
    include "../../../inc/cabecalho.php";
    include "../../../inc/validacaoAdmin.php";
    include "../../../inc/validacao.php";
    if (isset($_GET['id'])) {
        include "../../../back-end/buscarFuncoes.php";
    }

    if (isset($_GET['erro'])) {
        echo '<p class = "erro">' . $_GET["erro"] . '<p>';
    }
    ?>
</header>

<main>
    <div class="admin-form-container">
        <form class="admin-form" action="../../../back-end/verificacaoUsuario.php" method="get">
            <h1>Cadastro de usuário</h1>
            <label for="name">Nome</label>
            <?php
            if (isset($_GET['id'])) {
                $usuario = buscarUsuario($_GET['id']);
                echo '<input type="hidden" name="id" id="id" value="' . $_GET['id'] . '">';
            }
            if (isset($_GET['id'])) {
                echo '<input type="text" name="name" id="name" value="' . $usuario->nome . '">';
            } else {
                echo '<input type="text" name="name" id="name">';
            }
            ?>

            <label for="email">Email</label>
            <?php
            if (isset($_GET['id'])) {
                echo '<input type="email" name="email" id="email" value="' . $usuario->email . '" pattern=".+@(gmail\.com|outlook\.com|hotmail\.com|live\.com|msn\.com)" size="30" required>';
            } else {
                echo '<input type="email" name="email" id="email" pattern=".+@(gmail\.com|outlook\.com|hotmail\.com|live\.com|msn\.com)" size="30" required>';
            }
            ?>

            <label for="password">Senha:</label>
            <?php
            if (isset($_GET['id'])) {
                echo '<input type="password" name="password" id="password" value="' . $usuario->senha . '" required>';
            } else {
                echo '<input type="password" name="password" id="password" required>';
            }
            ?>

        <?php
            if($_SESSION['type'] === 'root'){
                echo '<label for="type">Tipo:</label>';
                if(isset($_GET['id'])){
                    echo '<select name="type" id="type" value="'. $usuario->tipo .'">
                         <option value="admin">Admin</option>
                         <option value="user">Usuário</option>
                         </select>';
                }else{
                    echo '<select name="type" id="type">
                         <option value="admin">Admin</option>
                         <option value="user">Usuário</option>
                         </select>';
                }
            }else{
                echo '<input type="hidden" name="type" id="type" value="user">';
            }
            
        ?>

            <button class="submit" type="submit">Enviar</button>
    </div>

</main>

<footer>
    <?php
    include "../../../inc/rodape.php"
    ?>
</footer>

</html>