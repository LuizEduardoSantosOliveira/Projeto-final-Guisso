<?php

require_once '../back-end/class/rb.php';
include  '../inc/validacao.php';


if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if (isset($_SESSION['name'])) {
    date_default_timezone_set('America/Sao_Paulo');


    $usuario = R::dispense('usuario');
    $usuario->nome = $_SESSION['name'];
    //$usuario->email = $email;
    $usuario->criado_em = date('Y-m-d H:i:s');



    $id = R::store($usuario);
    R::close();


    header('Location: ../front-end/pages/usuario/calendario.php');
    return $id;
    exit;
}
