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
    $reserva = R::load('reserva', $id);
    R::trash($reserva);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
