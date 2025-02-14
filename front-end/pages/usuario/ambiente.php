<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Ambiente</title>
</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        include "../../../back-end/buscarTodosAmbientes.php";
        include "../../../back-end/buscarTodasCategorias.php";

        ?>
    </header>

    <main>
        <?php

        $id_categoria = $_GET['category'];
        $categoria = R::load('categoria', $id_categoria);

        if (!$categoria->id) {
            die('Erro: Categoria não encontrada no banco.');
        };
        $ambientes = R::find('ambiente', 'id_categoria = ?', [$id_categoria]);
        ?>




        <form action="../../../back-end/verificacaoReserva.php" method="get">
            <fieldset>
                <legend>Ambiente</legend>

                <label for="date">Data: </label>
                <input id="date" type="text" name="date" value="<?php echo $_GET['date']; ?>" readonly><br><br>

                <label for="category">Categoria: </label>
                <input id="category" type="text" name="category" value="<?php echo $categoria->nome ?>" readonly><br><br>

                <label for="ambient">Ambiente: </label>
                <select name="ambient" id="ambient">
                    <?php
                    foreach ($ambientes as $ambiente) {
                        $categoria = R::load('categoria', $ambiente->categoria);
                        echo '<option value="' . $ambiente->id . '">' . htmlspecialchars($ambiente->nome) .  '</option>';
                    }
                    ?>
                </select>

                <input type="submit" value="Enviar">
            </fieldset>
        </form>

        <?php
        ?>



    </main>

    <footer>
        <?php
        include "../../../inc/rodape.php";

        ?>
    </footer>
</body>

</html>