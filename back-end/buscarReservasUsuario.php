<?php
require '../../../back-end/class/rb.php';
include '../../../inc/validacao.php';


if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
}


R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', 'root');
if (!R::testConnection()) {
    die('Falha na conexão com o banco de dados');
}

$usuario = R::findOne('usuario', 'nome = ?', [$_SESSION['name']]);


$reservas = R::find('reserva', 'nome = ?', [$_SESSION['name']]);

R::close();

?>