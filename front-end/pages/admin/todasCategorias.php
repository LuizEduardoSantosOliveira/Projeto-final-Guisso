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
    include "../../../back-end/buscarTodasCategorias.php";
    include "../../../inc/validacaoAdmin.php";
    include "../../../inc/cabecalho.php";
    include "../../../inc/validacao.php";



    ?>

</header>


<main>
    <div class="container">
        <h1>Categorias no sistema</h1>
        <div class="header-table">
            <?php echo '<h2>' . "Total de categorias no sistema: " . count($categorias) . '<a href="criarCategoria.php" class="btn btn-new">Criar categoria</a>' . '</h2>'; ?>

        </div>
        <?php if (count($categorias) > 0):
        ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrições</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td><?= $categoria->id ?></td>
                            <td><?= $categoria->nome ?></td>
                            <td><?= $categoria->descricao ?></td>
                            <td class="actions">
                                <a href="criarCategoria.php?id=<?= $categoria->id ?>"
                                    class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="../../../back-end/excluirCategoria.php?id=<?= $categoria->id ?>"
                                    class="btn btn-delete"
                                    onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else:
            echo "<div class='empty-state'><p>Você ainda não possui Categorias.</p><p>Clique em 'Criar categoria' para criar sua primeira categoria.</p></div>";
        endif; ?>
    </div>

</main>


<footer>
    <?php
    include "../../../inc/rodape.php";

    ?>
</footer>

</html>