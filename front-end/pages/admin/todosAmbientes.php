<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/67492479d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Ambientes do sistema</title>

</head>

<header>
    <?php
    include "../../../back-end/buscarTodosAmbientes.php";
    include "../../../inc/validacaoAdmin.php";
    include "../../../inc/cabecalho.php";
    include "../../../inc/validacao.php";


    ?>
    <div class="container">
        <div class="header">
            <div class="user-info">
                <strong>Usuário:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?>
            </div>
            <a href="criarAmbiente.php" class="btn btn-new">Novo Ambiente</a>
        </div>
</header>


<main>
    <h1>Ambientes no sistema</h1>
    <div class="stats">
        <strong>Total de ambientes:</strong> <?php echo count($ambientes); ?>
    </div>

    <?php if (count($ambientes) > 0):
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nome</th>
                    <th>descricao</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ambientes as $ambientes): ?>
                    <tr>
                        <td><?= $ambientes->id ?></td>
                        <td><?= $ambientes->categoria ?></td>
                        <td><?= $ambientes->nome ?></td>
                        <td><?= $ambientes->descricao ?></td>
                        <td class="actions">
                            <a href="editar_reserva.php?id=<?= $ambientes->id ?>"
                                class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../../../back-end/excluirCategoria.php?id=<?= $ambientes->id ?>"
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
            <p>Você ainda não possui ammbientes no sistema.</p>
            <p>Clique em "Novo ambiente" para criar seu primeiro ambiente.</p>
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