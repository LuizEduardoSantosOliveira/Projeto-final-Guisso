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


    ?>
</header>


<main>
   
    <div class="container">
    <h1>Reservas no sistema</h1>
    <div class="header-table">
               <?php echo '<h2>' . "Total de reservas no sistema: " . count($reservas) . '<a href="ambiente.php" class="btn btn-new">Nova Reserva</a>' . '</h2>' ; ?>
                
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva): ?>

                        <tr>
                            <td><?= $reserva->reservante ?></td>
                            <td><?= date('d/m/Y', strtotime($reserva->data_reserva)) ?></td>

                            <?php
                            $horas = json_decode($reserva->horas);
                            $stringHoras = "";
                            foreach ($horas as $hora) {
                                $timeHora = DateTime::createFromFormat('H:i:s', $hora);
                                $stringHora = $timeHora->format('H:i');
                                $stringHoras .= sprintf("%s, ", $stringHora);
                            }
                            ?>

                            <td><?= $stringHoras ?></td>
                            <td>
                                <span class="status status-ativa">
                                    Ativa
                                </span>
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

</main>


<footer>
    <?php
    include "../../../inc/rodape.php";

    ?>
</footer>

</html>