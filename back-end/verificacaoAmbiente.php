<?php
require_once 'class/rb.php';
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageTmpPath = $_FILES['image']['tmp_name'];
    $imageHash = md5_file($imageTmpPath); // Gerando hash da imagem para evitar duplicação

    // Verificando no banco de dados se já existe um ambiente com essa imagem
    $ambiente = R::findOne('ambiente', 'nome = ? OR hash_imagem = ?', [$_GET['ambient'], $imageHash]);

    if ($ambiente) {
        header("Location: ../front-end/pages/admin/criarAmbiente.php?erro=Erro ao fazer upload da imagem");
    exit();
    }
} else {
    header("Location: salvarambiente.php");
    exit();
   
}
