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
        ?>
    </header>   

    <main>
        <?php
        if (isset($_GET["date"])) {

            //arrays teste categoria e ambiente
            $categorias = [
                ['id' => 1, 'nome' => 'Tecnologia'],
                ['id' => 2, 'nome' => 'Administração'],
                ['id' => 3, 'nome' => 'Esportes'],
                ['id' => 4, 'nome' => 'Educação']
            ];
            
            // Mapeando ambientes para categorias para teste
            $ambientes = [
                ['id' => 1, 'categoria_id' => 1, 'nome' => 'Laboratório de Informática A'], 
                ['id' => 2, 'categoria_id' => 1, 'nome' => 'Laboratório de Informática B'], 
                ['id' => 3, 'categoria_id' => 2, 'nome' => 'Auditório'], 
                ['id' => 4, 'categoria_id' => 3, 'nome' => 'Quadra Poliesportiva'], 
                ['id' => 5, 'categoria_id' => 4, 'nome' => 'Estacionamento']
            ];

            $data = $_GET["date"];
            foreach ($categorias as $categoriakey) {
                if($_GET['categoria'] == $categoriakey['id']){
                    $categoria = $categoriakey;
                }
            }
        ?>
            <form action="../../../back-end/salvarReserva.php" method="get">
                <fieldset>
                    <legend>Ambiente</legend>

                    <label for="date">Data: </label>
                    <input id="date" type="text" name="date" value="<?php echo $data; ?>" readonly><br><br>

                    <label for="categoria">Categoria: </label>
                    <input id="categoria" type="text" name="categoria" value="<?php echo $categoria['nome']; ?>" readonly><br><br>

                    <label for="ambiente">Ambiente: </label>
                    <select name="ambiente" id="ambiente">
                        <?php
                            foreach ($ambientes as $ambiente) {
                                if ($ambiente['categoria_id'] == $categoria['id']) {
                                    echo '<option value="' . $ambiente['id'] . '">' . $ambiente['nome'] . '</option>';
                                }
                            }
                        ?>
                    </select><br><br>
                <input type="submit" value="Enviar">
                </fieldset>
            </form>
            
        <?php
        } else {
            //header('Location: ../front-end/calendario.php');
            echo "categoria não informada";
            exit;
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