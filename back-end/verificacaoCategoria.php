<?php
require_once 'class/rb.php';
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if(isset($_GET['id'])){
    $category = urlencode($_GET['category']);
    $description = urlencode($_GET['description']);
    $id = urlencode($_GET['id']);
    header("Location: salvarCategoria.php?category=" . $category . "&description=" . $description . "&id=" . $id);
    exit();
}else{
    $categoria = R::findOne('categoria', 'nome = ?', [$_GET['category']]);

    if ($categoria) {
        header("Location: ../front-end/pages/admin/criarCategoria.php?erro=Categoria já existente");
        exit();
    } else {
        $category = urlencode($_GET['category']);
        $description = urlencode($_GET['description']);
        header("Location: salvarCategoria.php?category=" . $category . "&description=" . $description);
        exit();
    }
}


