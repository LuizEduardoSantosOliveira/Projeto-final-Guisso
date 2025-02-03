<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ambiente</title>
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
        if ((isset($_GET["date"])) && (isset($_GET['categoria']))) {
            $data = $_GET["date"];
            $categoria = $_GET['categoria'];
        ?>
            <form action="salvarReserva.php" method="get">
                <fieldset>
                    <legend>Ambiente</legend>
                    <?php
                        foreach ($ambientes as $id => $ambiente) {
                            if ($ambiente['categoria_id'] == $categoria) {
                                echo '<option value="' . $ambiente['nome'] . '">' . $ambiente['nome'] . '</option>';
                            }
                        }
                    ?>
                </select><br><br>
                <input type="submit" value="Enviar">
                </fieldset>
            </form>

        <?php
        } else {
            header('Location: ../front-end/calendario.php');
            exit;
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