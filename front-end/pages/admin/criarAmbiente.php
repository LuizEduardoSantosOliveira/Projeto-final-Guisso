<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Criação de ambiente</title>
</head>

<body>
    <header>
        <?php
        include "../../../inc/validacaoAdmin.php";
        include "../../../inc/cabecalho.php";
        include "../../../back-end/buscarTodasCategorias.php";
        include "../../../inc/validacao.php";

        if (isset($_GET['erro'])) {
            echo '<p class = "erro">' . $_GET["erro"] . '<p>';
        }
        ?>
    </header>

    <main>
    <form action="../../../back-end/salvarAmbiente.php" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend>Criar Ambiente</legend>
                <label for="category">Categoria</label>
                <select name="category" id="category">
                    <?php
                    $categorias = R::findAll('categoria');
                    foreach ($categorias as $categoria) {
                        echo '<option value="' . $categoria->id . '">' . htmlspecialchars($categoria->nome) . '</option>';
                    }
                    ?>
                </select>

                <label for="ambient">Nome do Ambiente:</label>
                <input type="text" name="ambient" id="ambient"><br><br>

                <label for="image">Imagem do ambiente(Jpeg,Png e Jpg)</label>
                <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">

                <label for="description">Descrição do Ambiente:</label><br>
                <textarea name="description" id="description" cols="80" rows="5"></textarea><br><br>

               

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