<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Cadastro de usuário</title>
</head>
<body>
    <header>
        <?php
            include "../../../inc/validacao.php";
            include "../../../inc/cabecalho.php";
        ?>
    </header>

    <main>
        <form action="../../../back-end/salvarUsuario.php" method="get">
            <fieldset>
                <legend>Cadastrar Usuário</legend>
                <label for="username">Nome do Usuário:</label>
                <input type="text" name="username" id="username"><br><br>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email"><br><br>

                <label for="password">Senha:</label>
                <input type="password" name="pwd" id="pwd" ocult><br><br>

                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </main>

    <footer>
        <?php
            include "../../../inc/rodape.php";
        ?>
    </footer>
</body>
</html>