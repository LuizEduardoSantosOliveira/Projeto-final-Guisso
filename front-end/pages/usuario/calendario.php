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
        session_start();
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        include "../../../back-end/buscartodasreservas.php";
        include "../../../back-end/verificacaoDataReservada.php";


        if (isset($_GET['erro'])) {
            echo '<p class = "erro">' . $_GET["erro"] . '<p>';
        } 

        new DateTimeZone('America/Sao_Paulo');
        ?>
    </header>

    <main>
        <?php
        $ambienteId = $_GET['ambiente'];
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
                if(isset($_GET['id'])){
                    $linkReserva = "calendario.php?ambiente=" . $_GET['ambiente'] . "&date=" . $dataCompleta . "&id=" . $_GET['id'] . "&month_year=" . $_GET['month_year'];
                }else{
                    $linkReserva = "calendario.php?ambiente=" . $_GET['ambiente'] . "&date=" . $dataCompleta . "&month_year=" . $_GET['month_year'];
                }
                $dataString = sprintf("%04d-%02d-%02d", $ano, $mes, $dia);
                $data = DateTime::createFromFormat('Y-m-d', $dataString);
                $diaAtual = new DateTime('today'); 
                if($data < $diaAtual){
                    $calendario .= "<td>$dia</td>"; 
                }else{
                    $calendario .= "<td><a href='$linkReserva'>$dia</a></td>";
                }
                
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
            <input type="hidden" name="ambiente" value= <?php echo $ambienteId?>>
            <?php if(isset($_GET['id'])) { ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <?php } ?>
        </form>

        <div>
            <?php
            echo gerarCalendario($mesAtual, $anoAtual);
            ?>
        </div>
        <?php if(isset($_GET['date'])){ ?>
            <form method="get" action="<?php if(isset($_GET['id'])){echo "../../../back-end/editarReserva.php";}else{echo "../../../back-end/salvarReserva.php";} ?>">
                <br><h2>Horários para reserva</h2><br>
                <input type="hidden" name="date" value=<?php echo $_GET['date'] ?>>
                <input type="hidden" name="ambiente" value=<?php echo $_GET['ambiente'] ?>>
                <?php if(isset($_GET['id'])) { ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <?php } ?>
                <?php
                    for ($i=7; $i<=21 ; $i++) { 
                        $hora = sprintf("%02d:00:00", $i);
                        $horaDisponivel = verificarHorario($_GET['date'], $hora, $_GET['ambiente']);
                        if($horaDisponivel == true){
                            echo "<input type='checkbox' name='hora". $i ."' id='hora". $i ."' value='". $hora ."' disabled> <span style='color: red;'>". $i .":00</span> </input>";
                        }else{
                            echo "<input type='checkbox' name='hora". $i ."' id='hora". $i ."' value='". $hora ."'>" . $i . ":00</input>";
                        }
                        
                    }
                ?>
                <br><input type="submit" value="Enviar">
            </form>
        <?php } ?>
    </main>


    <footer>
        <?php
        include "../../../inc/rodape.php";

        ?>
    </footer>
</body>

</html>