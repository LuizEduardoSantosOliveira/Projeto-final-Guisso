<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambientes do sistema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f2f5;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #e3f2fd;
            border-radius: 4px;
        }

        .user-info {
            font-size: 16px;
            color: #1565c0;
        }

        .stats {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 4px;
            border-left: 4px solid #1565c0;
        }

        h1 {
            color: #1565c0;
            margin: 0 0 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #1565c0;
            color: white;
            font-weight: 500;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
        }

        .status-ativa {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-new {
            background-color: #4CAF50;
        }

        .btn-edit {
            background-color: #2196F3;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>

<header>
    <?php
    include "../../../back-end/buscarTodasCategorias.php";
    include "../../../inc/validacaoAdmin.php";
    include "../../../inc/cabecalho.php";
    include "../../../inc/validacao.php";



    ?>
    <div class="container">
        <div class="header">
            <div class="user-info">
                <strong>Usuário:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?>
            </div>
            <a href="criarCategoria.php" class="btn btn-new">Nova Categoria</a>
        </div>
</header>


<main>
    <h1>Categoria no sistema</h1>
    <div class="stats">
        <strong>Total de categorias:</strong> <?php echo count($categorias); ?>
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
                            <a href="editar_reserva.php?id=<?= $categoria->id ?>"
                                class="btn btn-edit">Editar</a>
                            <a href="../../../back-end/excluirCategoria.php?id=<?= $categoria->id ?>"
                                class="btn btn-delete"
                                onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty-state">
            <p>Você ainda não possui categorias.</p>
            <p>Clique em "Nova categoria" para criar sua primeira categoria.</p>
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