<?php
require_once 'class/rb.php';
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

$ambiente = R::findOne('ambiente', 'nome = ?', [$_GET['ambient']]);

if (!$ambiente) {
    $category = urlencode($_GET['category']);
    $ambient = urlencode($_GET['ambient']);
    $description = urlencode($_GET['description']);
    header("Location: salvarambiente.php?category=" . $category . "&ambient=" . $ambient . "&description=" . $description);
    exit();
} else {
    header("Location: ../front-end/pages/admin/criarAmbiente.php?erro=Ambiente já existente");
    exit();
}
