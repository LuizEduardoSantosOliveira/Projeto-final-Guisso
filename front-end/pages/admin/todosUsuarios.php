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
                <?php echo '<h2>' . "Total de usuários no sistema: " . count($usuario) . '<a href="cadastrarUsuario.php" class="btn btn-new">Novo Usuário</a>' . '</h2>'; ?>

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
                                    <?php if($usuario->tipo === 'root'){
                                        echo '<a href="#"';
                                        echo 'class="btn btn-edit-blocked"><i class="fa-solid fa-pen-to-square"></i></a>';
                                        echo '<a href="#"';
                                        echo 'class="btn btn-delete-blocked"';
                                        echo 'onclick="return confirm("Tem certeza que deseja excluir esta reserva?")" disabled>';
                                        echo '<i class="fa-solid fa-trash"></i>';
                                        echo '</a>';
                                    }else{
                                        echo '<a href="cadastrarUsuario.php?id=' . $usuario->id  . '"';
                                        echo 'class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>';
                                        echo '<a href="../../../back-end/excluirUsuario.php?id=' . $usuario->id  . '"';
                                        echo 'class="btn btn-delete"';
                                        echo 'onclick="return confirm("Tem certeza que deseja excluir esta reserva?")">';
                                        echo '<i class="fa-solid fa-trash"></i>';
                                        echo '</a>';
                                    } ?>
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