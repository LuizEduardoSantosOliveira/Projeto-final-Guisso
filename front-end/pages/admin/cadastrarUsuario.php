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

    if (isset($_GET['erro'])) {
        echo '<p class = "erro">' . $_GET["erro"] . '<p>';
    }
    ?>
</header>

<main>
    <div class="admin-form-container">
       
        <form class="admin-form" action="../../../back-end/verificacaoUsuario.php" method="get">
        <h1>Cadastro de Usuário</h1>
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" pattern=".+@(gmail\.com|outlook\.com|hotmail\.com|live\.com|msn\.com)" size="30" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>

            <label for="type">Tipo</label>
            <select name="type" id="type">
                <option value="admin">Admin</option>
                <option value="user">Usuário</option>


            </select>


            <button class="submit" type="submit">Enviar</button>
        </form>
    </div>

</main>

<footer>
    <?php
    include "../../../inc/rodape.php"
    ?>
</footer>

</html>