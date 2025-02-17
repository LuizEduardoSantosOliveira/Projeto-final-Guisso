<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sobre nós</title>
</head>

<body>
    <style>
        #fotoimg {
            height: 300px;
            width: 300px;
            border-radius: 100%;
            border: 5px solid #ffffff;
            margin: 0 auto;
            display: block;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        ?>
    </header>


    <main>
        <h1>Nosso time</h1>
        <br>
        <div class="foto"><img id="fotoimg" src="../../imgs/fotoluiz.jpeg" alt="foto do integrante do grupo luiz"></div>

        <h2>Luiz Eduardo</h2>
        <address>leso1@aluno.ifnmg.edu.br</address>
        <br>
        <div class="foto"><img id="fotoimg" src="../../imgs/fotolucas.jpeg" alt="foto do integrante do grupo lucas"></div>
        <h2>Lucas Virginio</h2>
        <address>lpv@aluno.ifnmg.edu.br</address>
        <br>
        <div class="foto"><img id="fotoimg" src="../../imgs/fotomalveira.jpeg" alt="foto do integrante do grupo Malveira"></div>
        <h2>João Malveira</h2>
        <address>jelm@aluno.ifnmg.edu.br</address>
        <br>
        <div class="foto"><img id="fotoimg" src="../../imgs/fotoheros.jpeg" alt="foto do integrante do grupo Heros"></div>
        <h2>Heros Augusto</h2>
        <address>habo1@aluno.ifnmg.edu.br</address>
    </main>


    <footer>
        <?php
        include '../../../inc/rodape.php';
        ?>
    </footer>
</body>

</html>