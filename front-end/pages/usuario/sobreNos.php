<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">

    <title>Sobre nós</title>
</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        ?>
    </header>


    <main>

        <div class="img-container">
            <h1>Nosso time</h1>

            <div class="card-img"><img id="fotoimg" src="../../imgs/fotoluiz.jpeg" alt="foto do integrante do grupo luiz">
                <h2>Luiz Eduardo</h2>
                <address>leso1@aluno.ifnmg.edu.br</address>

            </div>
            <div class="card-img"><img id="fotoimg" src="../../imgs/fotolucas.jpeg" alt="foto do integrante do grupo lucas">
                <h2>Lucas Virginio</h2>
                <address>lpv@aluno.ifnmg.edu.br</address>

            </div>

            <div class="card-img"><img id="fotoimg" src="../../imgs/fotomalveira.jpeg" alt="foto do integrante do grupo Malveira">
                <h2>João Malveira</h2>
                <address>jelm@aluno.ifnmg.edu.br</address>

            </div>

            <div class="card-img"><img id="fotoimg" src="../../imgs/fotoheros.jpeg" alt="foto do integrante do grupo Heros">
                <h2>Heros Augusto</h2>
                <address>habo1@aluno.ifnmg.edu.br</address>

            </div>

        </div>

    </main>


    <footer>
        <?php
        include '../../../inc/rodape.php';
        ?>
    </footer>
</body>

</html>