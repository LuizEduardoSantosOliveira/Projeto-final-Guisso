<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Criação de categoria</title>
</head>
<body>
    <header>
            <?php
                include "../../../inc/validacao.php" ;
                include "../../../inc/cabecalho.php";
            ?>
    </header>

    <main>

        
        <form action="../../../back-end/salvarCategoria.php" method="get">
            <label for="name">Nome da Categoria</label>
            <input type="text" name="name" id="name">

             <label for="description">Descrição da categoria</label>
            <textarea name="description" id="description" cols="40" rows="5"></textarea>

            <input type="submit" value="Enviar">

        </form>

    </main>


    <footer>
        <?php
             include "../../../inc/rodape.php";
        ?>

    </footer>
</body>
</html>