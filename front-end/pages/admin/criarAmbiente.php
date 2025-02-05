<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Criação de ambiente</title>
</head>
<body>
    <header>
        <?php
            include "../../../inc/validacao.php";
            include "../../../inc/cabecalho.php";
            include "../../../back-end/buscarTodasCategorias.php";
        ?>
    </header>
    
    <main>
        <form action="../../../back-end/salvarAmbiente.php" method="get">
            <fieldset>
                <legend>Criar Ambiente</legend>

                <label for="ambient">Nome do Ambiente:</label>
                <input type="text" name="ambient" id="ambient"><br><br>   

                <label for="description">Descrição do Ambiente:</label><br>
                <textarea name="description" id="description" cols="80" rows="5"></textarea><br><br>

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
            include "../../../inc/rodape.php";
        ?>
    </footer>
</body>
</html>