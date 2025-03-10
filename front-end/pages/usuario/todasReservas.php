<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Reservas no Sistema</title>

</head>

<header>
    <?php
    include "../../../back-end/buscarTodasReservas.php";
    include "../../../inc/validacao.php";
    include "../../../inc/cabecalho.php";
    include "../../../back-end/buscarFuncoes.php";

    if(isset($_SESSION['email'])){
        $usuario = buscarUsuarioEmail($_SESSION['email']);
    }
    ?>
</header>


<main>

    <div class="container">
        <h1>Reservas no sistema</h1>
        <div class="header-table">
            <?php 
                if(isset($_GET['visitante'])){
                    echo '<h2>' . "Total de reservas no sistema: " . count($reservas) . '</h2>';
                }else{
                   
                   echo '<h2>' . "Total de reservas no sistema: " . count($reservas) . '<a href="ambiente.php" class="btn btn-new">Criar reserva</a>' . '</h2>';
    
        
                }
            ?>
        </div>

        <div class="stats">
            <strong>Total de Reservas:</strong> <?php echo count($reservas); ?>
        </div>

        <?php if (count($reservas) > 0):
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Reservante</th>
                        <th>Data da Reserva</th>
                        <th>Horários Reservados</th>
                        <th>Status</th>
                        <th>Categoria</th>
                        <th>ambiente</th>
                        <?php 
                            if(isset($_SESSION['email'])):
                            if ($usuario->tipo != 'visitante'): 
                        ?>
                            <th>Ações</th>
                        <?php endif; endif; ?>     
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dataHoraAtual = new DateTime('now');
                    $horaAtual = $dataHoraAtual->format('H:i:s');
                    foreach ($reservas as $reserva):
                    ?>

                        <tr>
                            <td><?= $reserva->reservante ?></td>
                            <td><?= date('d/m/Y', strtotime($reserva->data_reserva)) ?></td>

                            <?php
                            $horas = json_decode($reserva->horas);
                            $horaFinal = end($horas);
                            $dataHoraFinal = DateTime::createFromFormat('Y-m-d H:i:s', "$reserva->data_reserva $horaFinal");
                            $stringHoras = "";
                            foreach ($horas as $hora) {
                                $timeHora = DateTime::createFromFormat('H:i:s', $hora);
                                $stringHora = $timeHora->format('H:i');
                                $stringHoras .= sprintf("%s, ", $stringHora);
                            }
                            ?>

                            <td><?= $stringHoras ?></td>
                            <td>
                                <?php
                                if ($dataHoraFinal < $dataHoraAtual) {
                                    echo "<span class='status status-inativa'>Inativa</span>";
                                } else {
                                    echo "<span class='status status-ativa'>Ativa</span>";
                                }
                                ?>
                            </td>
                            <td><?= $reserva->ambiente->categoria ?></td>
                            <td><?= $reserva->ambiente->nome ?></td>
                            <?php
                                if(isset($_SESSION['email'])):
                                if ($usuario->tipo !='visitante'):  
                            ?>
                                    <td class="actions">
                                    <a href="ambiente.php?id=<?= $reserva->id ?>"
                                        class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../../../back-end/excluirReserva.php?id=<?= $reserva->id ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    </td>
                            <?php endif; endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else:
            echo "<div class='empty-state'><p>Você ainda não possui reservas.</p><p>Clique em 'Nova reserva' para criar sua primeira reserva.</p></div>";
        endif; ?>
    </div>

</main>


<footer>
    <?php
    include "../../../inc/rodape.php";

    ?>
</footer>

</html>