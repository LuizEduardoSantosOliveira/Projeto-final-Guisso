<?php
require '../../../back-end/class/rb.php';
include '../../../inc/validacao.php';

R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', 'root');
if (!R::testConnection()) {
    die('Falha na conexão com o banco de dados');
}


$usuario = R::findAll("usuario");

$reservas = R::findAll("reserva");

R::close();

?>