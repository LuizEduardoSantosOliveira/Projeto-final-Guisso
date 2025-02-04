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
        ?>
    </header>
    
    <main>
        <form action="../../../back-end/salvarAmbiente.php" method="get">
            <fieldset>
                <legend>Criar Ambiente</legend>

                <label for="nome">Nome do Ambiente:</label>
                <input type="text" name="nome" id="nome"><br><br>   

                <label for="descricao">Descrição do Ambiente:</label><br>
                <textarea name="descricao" id="descricao" cols="80" rows="5"></textarea><br><br>

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