<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Usuários do sistema</title>

</head>

<body>



    <header>
        <?php

        include "../../../back-end/buscarTodosUsuarios.php";
        include "../../../inc/validacaoAdmin.php";
        include "../../../inc/cabecalho.php";
        include "../../../inc/validacao.php";

        ?>

    </header>


    <main>
        <div class="container">
            <h1>Usuários no Sistema</h1>
            <div class="header-table">
                <?php echo '<h2>' . "Total de usuários no sistema: " . count($usuario) . '<a href="../usuario/cadastrarUsuario.php" class="btn btn-new">Nova Reserva</a>' . '</h2>'; ?>

            </div>

            <?php if (count($usuarios) > 0):
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Criado em</th>
                            <th>Email</th>
                            <th>Senha</th>
                            <th>Tipo</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?= $usuario->id ?></td>
                                <td><?= $usuario->nome ?></td>
                                <td><?= date('d/m/Y', strtotime($usuario->criado_em)) ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->senha ?></td>
                                <td><?= $usuario->tipo ?></td>
                                <td class="actions">
                                    <a href="cadastrarUsuario.php?id=<?= $usuario->id ?>"
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
            <?php endif; ?>
        </div>

    </main>


    <footer>
        <?php
        include "../../../inc/rodape.php";

        ?>
    </footer>

</html>