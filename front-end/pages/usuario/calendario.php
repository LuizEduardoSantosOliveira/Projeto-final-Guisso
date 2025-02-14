<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Calendário</title>


</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";


        if (isset($_GET['erro'])) {
            echo '<p class = "erro">' . $_GET["erro"] . '<p>';
        } else {
            echo "nao funcionou";
        }
        ?>
    </header>

    <main>
        <?php
        $mesAtual = isset($_GET['month']) ? intval($_GET['month']) : date('m');
        $anoAtual = isset($_GET['year']) ? intval($_GET['year']) : date('Y');


        if (isset($_GET['month_year'])) {
            $parsedDate = date_parse($_GET['month_year']);
            $mesAtual = $parsedDate['month'];
            $anoAtual = $parsedDate['year'];
        }

        function gerarCalendario($mes, $ano)
        {


            $nomeMeses = [
                1 => 'Janeiro',
                2 => 'Fevereiro',
                3 => 'Março',
                4 => 'Abril',
                5 => 'Maio',
                6 => 'Junho',
                7 => 'Julho',
                8 => 'Agosto',
                9 => 'Setembro',
                10 => 'Outubro',
                11 => 'Novembro',
                12 => 'Dezembro'
            ];

            $mes = max(1, min(12, (int)$mes));
            $diaInicial = date('w', strtotime("$ano-$mes-01"));
            $totalDias = date('t', strtotime("$ano-$mes-01"));

            $calendario = "<h2>{$nomeMeses[$mes]} de $ano</h2>\n";
            $calendario .= "<table>\n";
            $calendario .= "<tr><th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sáb</th></tr>\n";
            $calendario .= "<tr>";

            for ($i = 0; $i < $diaInicial; $i++) {
                $calendario .= "<td></td>";
            }

            for ($dia = 1; $dia <= $totalDias; $dia++) {
                if (($dia + $diaInicial - 1) % 7 == 0 && $dia != 1) {
                    $calendario .= "</tr><tr>";
                }

                $dataCompleta = sprintf("%d-%02d-%02d", $ano, $mes, $dia);
                $linkReserva = "categoria.php?date=" . $dataCompleta;
                $calendario .= "<td><a href='$linkReserva'>$dia</a></td>";
            }

            $espacosRestantes = 7 - (($totalDias + $diaInicial) % 7);
            if ($espacosRestantes < 7) {
                for ($i = 0; $i < $espacosRestantes; $i++) {
                    $calendario .= "<td></td>";
                }
            }

            $calendario .= "</tr>\n</table>";

            return $calendario;
        }
        ?>
        <h1>Calendário de Reservas</h1>

        <form method="get" action="">
            <label for="month_year">Mês:</label>
            <input type="month" name="month_year" value="<?php echo $anoAtual . '-' . sprintf('%02d', $mesAtual); ?>" onchange="this.form.submit()">

        </form>

        <div>
            <?php
            echo gerarCalendario($mesAtual, $anoAtual);
            ?>
        </div>
    </main>


    <footer>
        <?php
        include "../../../inc/rodape.php";

        ?>
    </footer>
</body>

</html>