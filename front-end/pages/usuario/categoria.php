<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        if(isset($_GET["date"])){
            $data = $_GET["date"];
            
            //arrays teste categoria e ambiente
            $categorias = [
                ['id' => 1, 'nome' => 'Tecnologia'],
                ['id' => 2, 'nome' => 'Administração'],
                ['id' => 3, 'nome' => 'Esportes'],
                ['id' => 4, 'nome' => 'Educação']
            ];
            
            // Mapeando ambientes para categorias
            $ambientes = [
                ['id' => 1, 'categoria_id' => 1, 'nome' => 'Laboratório de Informática A'], 
                ['id' => 2, 'categoria_id' => 1, 'nome' => 'Laboratório de Informática B'], 
                ['id' => 3, 'categoria_id' => 2, 'nome' => 'Auditório'], 
                ['id' => 4, 'categoria_id' => 3, 'nome' => 'Quadra Poliesportiva'], 
                ['id' => 5, 'categoria_id' => 4, 'nome' => 'Estacionamento']
            ];
       ?> 

       <form action="ambiente.php" method="get">
            <fieldset>
                <legend>Categoria</legend>
                <label for="date">Data:</label>
                <input id="date" type="text" name="date" value="<?php echo $data; ?>" readonly><br><br>
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria">
                    <?php
                        foreach ($categorias as $categoria) {
                            echo '<option value="' . $categoria['id'] . '">' . $categoria['nome'] . '</option>';    
                        }
                    ?>
                </select>
                <input type="submit" value="Enviar">
            </fieldset>
       </form>

       <?php
        }
        ?>
    </main>

    <footer>
        <?php
        include "../../../inc/rodape.php"

        ?>
    </footer>
</body>
</html>