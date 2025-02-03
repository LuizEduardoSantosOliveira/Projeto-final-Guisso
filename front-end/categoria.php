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
            include "../inc/cabecalho.php";
            include "../inc/validacao.php";
        ?>
    </header>

    <main>
       <?php
        if(isset($_GET["date"])){
            $data = isset($_GET["date"]);
       ?> 

       <form action="ambiente.php" method="get">
            <fieldset>
                <legend>Categoria</legend>
                <label for="data">Data:</label>
                <input id="data" type="text" name="data" value="<?php echo $data; ?>" readonly><br><br>
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
        include "../inc/rodape.php"

        ?>
    </footer>
</body>
</html>