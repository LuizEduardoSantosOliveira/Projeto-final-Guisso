<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        include "../../../back-end/buscarTodasCategorias.php";
        ?>
    </header>

    <main>


        <form action="ambiente.php" method="get">
            <fieldset>
                <legend>Categoria</legend>
                <label for="date">Data:</label>
                <input id="date" type="text" name="date" value="<?php echo $_GET['date']; ?>" readonly><br><br>
                <label for="category">Categoria</label>
                <select name="category" id="category">
                    <?php
                    foreach ($categorias as $categoria) {
                        echo '<option value="' . $categoria->id . '">' . $categoria->nome . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>




    </main>

    <footer>
        <?php
        include "../../../inc/rodape.php"

        ?>
    </footer>
</body>

</html>