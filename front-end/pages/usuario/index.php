<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Documento</title>
</head>

<body>
    <header>
        <?php
            include "../inc/cabecalho.php"
                

        ?>
    </header>

    <main>
         <form action="../back-end/login.php" method="get">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name">
            <input type="submit" value="Enviar">
        </form>
    </main>

    <footer>
        <?php
            include "../inc/rodape.php"

        ?>
    </footer>
</body>

</html>