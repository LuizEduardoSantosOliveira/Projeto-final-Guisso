<?php
require_once  '../../../back-end/class/rb.php';
include '../../../inc/validacao.php';

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}


$usuario = R::findAll("usuario");

$reservas = R::findAll("reserva");

R::close();
