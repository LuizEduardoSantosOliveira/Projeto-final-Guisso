<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Ambiente</title>
</head>

<body>

    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        include "../../../back-end/buscarTodasCategorias.php";
        include "../../../back-end/buscarTodosAmbientes.php";
        ?>
    </header>

    <main>
        <?php
        foreach ($categorias as $categoria) {
            echo '<h2>' . htmlspecialchars($categoria->nome) . '</h2>';
            foreach ($ambientes as $ambiente) {
                if ($ambiente->id_categoria == $categoria->id) {
                    if (isset($_GET['id'])) {
                        $linkcalendario = "calendario.php?ambiente=" . $ambiente->id . "&id=" . $_GET['id'];
                    } else {
                        $linkcalendario = "calendario.php?ambiente=" . $ambiente->id;
                    }

                    echo '<div class = "card-ambient">';
                    echo '<h4><a href="' . $linkcalendario . '">' . htmlspecialchars($ambiente->nome) . '</a></h4>';
                    echo '<p>' . htmlspecialchars($ambiente->descricao) . '</p>';

                    if (!empty($ambiente->imagem)) {
                        $imagemPath = "../../" . ltrim($ambiente->imagem, './');
                        echo '<img src="' . htmlspecialchars($imagemPath) . '" alt="Imagem do ambiente" style="width: 300px; height: auto;">';
                    } else {
                        echo '<p>Sem imagem disponível</p>';
                    }

                    echo '</div>';
                }
            }
        }
        ?>
    </main>


    <footer>
        <?php
        include "../../../inc/rodape.php";
        ?>
    </footer>
</body>

</html>