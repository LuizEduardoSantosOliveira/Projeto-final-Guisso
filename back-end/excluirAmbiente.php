<?php
require_once 'class/rb.php';

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ambiente = R::load('ambiente', $id);

    if ($ambiente->id) { // Verifica se o ambiente realmente existe
        $imagePath = $ambiente->imagem; // Obtém o caminho da imagem

        // Excluir a imagem do servidor, se existir
        if (!empty($imagePath) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Excluir o ambiente do banco de dados
        R::trash($ambiente);

        // Redirecionar para a página anterior
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Caso o ambiente não seja encontrado
        header('Location: ../front-end/pages/admin/todosAmbientes.php?erro=Ambiente não encontrado');
        exit;
    }
} else {
    // Caso o ID não tenha sido passado na URL
    header('Location: ../front-end/pages/admin/todosAmbientes.php?erro=ID inválido');
    exit;
}
