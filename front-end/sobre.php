<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        include "../inc/cabecalho.php";
        ?>
    </header>
</body>
<h1>Nosso time</h1>
<br>
<div class="foto"><img id="fotoimg" src="./imgs/fotolulu.jpeg" alt="fotolulu"></div>

<h2>Luiz Eduardo</h2>
<address>leso1@aluno.ifnmg.edu.br</address>
<br>
<div class="foto"><img id="fotoimg" src="./imgs/fototchunga.jpeg" alt="fototchunga"></div>
<h2>Lucas Virginio</h2>
<address>lpv@aluno.ifnmg.edu.br</address>
<br>
<div class="foto"><img id="fotoimg" src="./imgs/fotomalvado.jpeg" alt="fotomalvado"></div>
<h2>João Malveira</h2>
<address>jelm@aluno.ifnmg.edu.br</address>
<br>
<div class="foto"><img id="fotoimg" src="./imgs/fotoherois.jpeg" alt="fotoherois"></div>
<h2>Heros Augusto</h2>
<address>habo1@aluno.ifnmg.edu.br</address>

<footer>
    <?php
        include '../inc/rodape.php';
        if ($paginaAtual !== 'sobre.php') {
            echo '<a href="../reserva/sobre.php">Sobre Nós</a>';
            
        
        }
    ?>
</footer>

</html>