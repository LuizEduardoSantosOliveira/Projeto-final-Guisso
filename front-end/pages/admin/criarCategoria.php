<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <title>Criação de categoria</title>


    <style>
        .erro {
            background-color: red;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include "../../../inc/validacaoAdmin.php";
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        if(isset($_GET['id'])){
            include "../../../back-end/buscarFuncoes.php";
        }


        if (isset($_GET['erro'])) {
            echo '<p class = "erro">' . $_GET["erro"] . '<p>';
        }
        ?>
    </header>

    <main>
        <div class="admin-form-container">
            <form class="admin-form" action="../../../back-end/verificacaoCategoria.php" method="get">
            <h1>Cadastro de Categoria</h1>
                <?php
                    if(isset($_GET['id'])){
                        $categoria = buscarCategoria($_GET['id']);
                        echo '<input type="hidden" name="id" id="id" value="' . $_GET['id'] . '">';
                    }
                ?>
                <label for="category">Nome da Categoria:</label>
                <?php
                    if(isset($_GET['id'])){
                        echo '<input type="text" name="category" id="category" value="' . $categoria->nome . '">';
                    }else{
                        echo '<input type="text" name="category" id="category">';
                    }
                ?>

                <label for="description">Descrição da categoria:</label><br>
                <?php
                    if(isset($_GET['id'])){
                        echo '<textarea name="description" id="description" cols="80" rows="5">' . $categoria->descricao . '</textarea><br><br>';
                    }else{
                        echo '<textarea name="description" id="description" cols="80" rows="5"></textarea><br><br>';
                    }
                ?>

                <button class="submit" type="submit">Enviar</button>

            </form>

        </div>



    </main>


    <footer>
        <?php
        include "../../../inc/rodape.php";
        ?>

    </footer>
</body>

</html>