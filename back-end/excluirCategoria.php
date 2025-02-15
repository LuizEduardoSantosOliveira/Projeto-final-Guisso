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
    $categoria = R::load('categoria', $id);
    R::trash($categoria);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
