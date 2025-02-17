<?php
require_once '../../../back-end/class/rb.php';
include '../../../inc/validacao.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

$usuario = R::findOne('usuario', 'email = ?', [$_SESSION['email']]);

$reservas = R::find('reserva', 'reservante = ?', [$_SESSION['name']]);

R::close();
