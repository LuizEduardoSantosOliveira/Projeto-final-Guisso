<?php
require_once 'class/rb.php';

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica se a imagem foi enviada
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageHash = md5_file($imageTmpPath); // Gera hash único para evitar imagens duplicadas

        // Verifica se a imagem já existe no banco de dados
        $ambienteExistente = R::findOne('ambiente', 'nome = ? OR hash_imagem = ?', [$_POST['ambient'], $imageHash]);

        if ($ambienteExistente) {
            header("Location: ../front-end/pages/admin/criarAmbiente.php?erro=Nome ou imagem já existem");
            exit();
        }

        // Define o diretório de upload
        $uploadDir = '../uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Cria a pasta se não existir
        }

        // Gera um nome único para a imagem
        $imagePath = $uploadDir . uniqid() . '_' . basename($imageName);
        move_uploaded_file($imageTmpPath, $imagePath);

        // Criando o ambiente no banco de dados
        $ambiente = R::dispense('ambiente');
        $ambiente->nome = $_POST['ambient'];
        $ambiente->descricao = $_POST['description'];
        $ambiente->imagem = $imagePath; // Caminho da imagem
        $ambiente->hash_imagem = $imageHash; // Hash da imagem

        $categoria = R::load('categoria', $_POST['category']);
        $ambiente->categoria = $categoria->nome;
        $ambiente->id_categoria = $categoria->id;

        R::store($ambiente);
        R::close();

        header('Location: ../front-end/pages/admin/todosAmbientes.php');
        exit();
    } else {
        header("Location: ../front-end/pages/admin/criarAmbiente.php?erro=Erro ao fazer upload da imagem");
        exit();
    }
} else {
    header("Location: ../front-end/pages/admin/criarAmbiente.php?erro=Requisição inválida");
    exit();
}
