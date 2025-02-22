<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../front-end/css/style.css">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <title>Painel do Administrador</title>
</head>

<body>
    <header>
        <?php
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacaoAdmin.php";
        include "../../../inc/validacao.php";
        include "../../../back-end/buscarTodasReservas.php";
        include "../../../back-end/buscarTodosAmbientes.php";
        include "../../../back-end/buscarTodasCategorias.php";
        include "../../../back-end/buscarTodosUsuarios.php";

        ?>
        <nav class="menu">
            <ul>
                <li><a href="cadastrarUsuario.php">Cadastrar Usuário</a></li>
                <li><a href="criarAmbiente.php">Criar Ambiente</a></li>
                <li><a href="criarCategoria.php">Criar Categoria</a></li>
                <li><a href="todosUsuarios.php">Todos Usários</a></li>
                <li><a href="todosAmbientes.php">Todos Ambientes</a></li>
                <li><a href="todasCategorias.php">Todas Categorias</a></li>
                <li><a href="../usuario/todasReservas.php">Todas Reservas</a></li>
            </ul>
        </nav>
    </header>

    <main>


        <div class="informacoes">
            <div class="usuario">
                <h3>Usuários</h3>
                <?php
                $todosUsuarios = count($usuarios);
                echo '<p>' . $todosUsuarios . '<i class="fa-solid fa-users"></i>' . '</p>';
                ?>
            </div>

            <div class="ambiente">
                <h3>Ambientes</h3>
                <?php

                $todosAmbientes = count($ambientes);
                echo '<p>' . $todosAmbientes . '<i class="fa-solid fa-location-dot"></i>' . '</p>';
                ?>
            </div>
            <div class="categoria">
                <h3>Categoria</h3>

                <?php
                $todasCategorias = count($categorias);
                echo '<p>' . $todasCategorias . ' <i class="fa-solid fa-list"></i>' . '</p>';
                ?>


            </div>

            <div class="reserva">
                <h3>Reserva</h3>

                <?php
                $todasReservas = count($reservas);
                echo '<p>' . $todasReservas . '<i class="fa-solid fa-calendar"></i>' . '</p>';
                ?>
            </div>
        </div>

        <div class="container">
            <h1>Ultimas Reservas Feitas no sistema</h1>
            <div class="header-table">
                <?php echo '<h2>' . "Total de reservas no sistema: " . count($reservas) . '<a href="../usuario/ambiente.php" class="btn btn-new">Nova Reserva</a>' . '</h2>'; ?>

            </div>

            <?php
            if (count($reservas) > 0):
                $ultimasReservas = array_slice(array_reverse($reservas), 0, 5);
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
                        <?php foreach ($ultimasReservas as $reserva): ?>

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
        include "../../../inc/rodape.php"
        ?>

    </footer>

</body>

</html>