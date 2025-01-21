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
            include_once "..inc/cabecalho.php";
        ?>
    </header>
    
    <main>
        <!-- salvar no banco de dados aqui -->

        <h1>Reserva Cadastrada</h1>
        <p>Id da reserva: <?php echo $id; ?></p>
        <p>Nome do reservante: <?php echo $_SESSION['name'];?></p>
        <p>Data e hora da reserva: <?php echo $data;?></p>
        <p>Ambiente reservado: <?php echo $ambientes[$_GET['ambiente']];?></p>
    </main>

    <footer>
        <?php
            include_once "../inc/rodape.php";
        ?>
    </footer>
</body>
</html>