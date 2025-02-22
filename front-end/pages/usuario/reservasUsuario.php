<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Minhas Reservas</title>

</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../back-end/buscarReservasUsuario.php";
        ?>

    </header>

    <main>
        <?php




        // Limitar para as últimas 5 reservas
        $ultimasReservas = array_slice($reservas, 0, 5);
        ?>
        <div class="container">
            <div class="header">
                <a href="ambiente.php" class="btn btn-new">Nova Reserva</a>
            </div>

            <h1>Minhas Reservas</h1>

            <div class="stats">
                <strong>Total de Reservas:</strong> <?php echo count($reservas); ?>
            </div>

            <?php if (count($ultimasReservas) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data da Reserva</th>
                            <th>Horários Reservados</th>
                            <th>Status</th>
                            <th>Categoria</th>
                            <th>Ambiente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $dataHoraAtual = new DateTime('now');
                            $horaAtual = $dataHoraAtual->format('H:i:s');
                            foreach ($ultimasReservas as $reserva): 
                        ?>
                            <tr>
                                <td><?= $reserva->id ?></td>
                                <td><?= date('d/m/Y', strtotime($reserva->data_reserva)) ?></td>

                                <?php
                                $horas = json_decode($reserva->horas);
                                $stringHoras = "";
                                $horaFinal = end($horas);
                                $dataHoraFinal = DateTime::createFromFormat('Y-m-d H:i:s', "$reserva->data_reserva $horaFinal");
                                foreach ($horas as $hora) {
                                    $timeHora = DateTime::createFromFormat('H:i:s', $hora);
                                    $stringHora = $timeHora->format('H:i');
                                    $stringHoras .= sprintf("%s, ", $stringHora);
                                }
                                ?>

                                <td><?= $stringHoras ?></td>
                                <td>
                                    <?php
                                        if($dataHoraFinal < $dataHoraAtual){
                                            echo "<span class='status status-inativa'>Inativa</span>";
                                        }else{
                                            echo "<span class='status status-ativa'>Ativa</span>";
                                        }
                                    ?>
                                </td>
                                <td><?= $reserva->ambiente->categoria ?></td>
                                <td><?= $reserva->ambiente->nome ?></td>
                                <td class="actions">
                                    <a href="ambiente.php?id=<?= $reserva->id ?>"
                                        class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../../../back-end/excluirCategoria.php?id=<?= $reserva->id ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <p>Você ainda não possui reservas.</p>
                    <p>Clique em "Nova Reserva" para criar sua primeira reserva.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php
        // Fecha a conexão com o banco de dados
        R::close();
        ?>
    </main>


    <footer>
        <?php include "../../../inc/rodape.php"; ?>
    </footer>
</body>

</html>