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
        if(isset($_GET['id'])){
            include "../../../back-end/buscarFuncoes.php";
        }

        if (isset($_GET['erro'])) {
            echo '<p class = "erro">' . $_GET["erro"] . '<p>';
        }
        ?>
    </header>

    <main>
        <div class="admin-form-ambient-container">
            <form class="admin-ambient-form" action="../../../back-end/salvarAmbiente.php" method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_GET['id'])){
                        $ambiente = buscarAmbiente($_GET['id']);
                        echo '<input type="hidden" name="id" id="id" value="' . $_GET['id'] . '">';
                    }
                ?>
                <h1>Cadastro de ambiente</h1>
                    <label for="category">Categoria</label>
                    <select name="category" id="category">
                        <?php
                            $categorias = R::findAll('categoria');
                            foreach ($categorias as $categoria) {
                                if($categoria->id == $ambiente->id_categoria){
                                    echo '<option value="' . $categoria->id . '" selected>' . htmlspecialchars($categoria->nome) . '</option>';
                                }else{
                                    echo '<option value="' . $categoria->id . '">' . htmlspecialchars($categoria->nome) . '</option>';
                                }
                            }
                        ?>
                    </select>

                    <label for="ambient">Nome do Ambiente:</label>
                    <?php
                        if(isset($_GET['id'])){
                            echo '<input type="text" name="ambient" id="ambient" value="' . $ambiente->nome . '"><br><br>';
                        }else{
                           echo '<input type="text" name="ambient" id="ambient"><br><br>';
                        }
                    ?>

                    <label for="image">Imagem do ambiente(Jpeg,Png e Jpg)</label>
                           <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg">

                    <label for="description">Descrição do Ambiente:</label><br>
                    <?php
                        if(isset($_GET['id'])){
                            echo '<textarea name="description" id="description" cols="80" rows="5">'. $ambiente->descricao .'</textarea><br><br>';
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