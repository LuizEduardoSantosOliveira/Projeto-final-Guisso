<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Home</title>
</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";
        ?>
        <nav class="menu">
            <ul>
                <li><a href="ambiente.php">Fazer reserva</a></li>
                <li><a href="reservasUsuario.php">Minhas reservas</a></li>
                <li><a href="sobreNos.php">Sobre Nós</a></li>
                <li><a href="todasReservas.php">Reservas no sistema</a></li>
            </ul>

        </nav>
    </header>

    <main>


        <?php
        // Incluir o arquivo que busca todas as reservas
        include "../../../back-end/buscarReservasUsuario.php";
        if (count($reservas) > 0) {
            // Usando array_slice para pegar as 5 últimas reservas
            $ultimasReservas = array_slice($reservas, 0, 5);
        ?>
            <div class="container">
                <h1>Últimas Reservas</h1>
                <div class="header-table">
                    <?php echo '<h2>' . "Total de reservas no sistema: " . count($reservas) . '<a href="../usuario/ambiente.php" class="btn btn-new">Nova Reserva</a>' . '</h2>'; ?>

                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Data da Reserva</th>
                            <th>Horário Reservado</th>
                            <th>Status</th>
                            <th>Categoria</th>
                            <th>ambiente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $dataHoraAtual = new DateTime('now');
                         $horaAtual = $dataHoraAtual->format('H:i:s');
                        foreach ($reservas as $reserva):?> 
                        
                            <tr>
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
                                    <a href="editar_reserva.php?id=<?= $usuario->id ?>"
                                        class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../../../back-end/excluirCategoria.php?id=<?= $usuario->id ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php
        } else {
            // Caso não tenha reservas
            echo "<div class='empty-state'><p>Você ainda não possui reservas.</p><p>Clique em 'Fazer reserva' para criar sua primeira reserva.</p></div>";
        }
        ?>
    </main>

    <footer>
        <?php include "../../../inc/rodape.php"; ?>
    </footer>
</body>

</html>