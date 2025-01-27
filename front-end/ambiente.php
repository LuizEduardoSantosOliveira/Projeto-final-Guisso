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
        if (isset($_GET["date"])) && (isset($_GET['categoria'])) {
            $data = $_GET["date"];
        ?>
            <form action="salvarReserva.php" method="get">
                
                    <?php
                        
                        $categoria = $_GET['categoria'];
                        foreach ($ambientes as $id => $ambiente) {
                            if ($ambiente['categoria_id'] == $categoria) {
                                echo '<option value="' . $ambiente['nome'] . '">' . $ambiente['nome'] . '</option>';
                            }
                        }
                    }
                    ?>
                    <!-- <option value="labinfoa">Laboratório de Informática A</option>
>>>>>>> 61e5d64 (alteração pra apresentar os ambientes com base na categoria, tá com erro mas depois eu corrijo)
                    <option value="labinfob">Laboratório de Informática B</option>
                    <option value="auditorio">Auditório</option>
                    <option value="quadra">Quadra Poliesportiva</option>
                    <option value="e estac">Estacionamento</option> -->
                </select><br><br>
                <input type="submit" value="Enviar">
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