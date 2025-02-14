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
    $usuario = R::load('usuario', $id);
    R::trash($usuario);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
