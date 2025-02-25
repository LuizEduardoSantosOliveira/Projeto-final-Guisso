<?php

require_once 'class/rb.php';

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


date_default_timezone_set('America/Sao_Paulo');

$usuarioValido = R::findOne('usuario', 'tipo = ?', ['root']);


if (!$usuarioValido) {
    $usuario = R::dispense('usuario');
    $usuario->nome = "root";
    $usuario->email = "admin@gmail.com";
    $usuario->senha = "root";
    $usuario->tipo = "root";
    $usuario->criado_em = date('Y-m-d H:i:s');



    $id = R::store($usuario);
    R::close();
    header('Location: ../front-end/pages/admin/adminPainel.php');
    $_SESSION["type"] = "root";
    return $id;
    exit;
} else {
    echo "Usuário Root ja criado no sistema";
}
