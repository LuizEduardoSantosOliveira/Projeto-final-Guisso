<?php

require_once '../back-end/class/rb.php';

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

date_default_timezone_set('America/Sao_Paulo');

$usuarioValido = R::findOne('usuario', 'tipo = ?', ['admin']);


if (!$usuarioValido) {
    $usuario = R::dispense('usuario');
    $usuario->nome = "root";
    $usuario->email = "admin@gmail.com";
    $usuario->senha = "root";
    $usuario->tipo = "admin";
    $usuario->criado_em = date('Y-m-d H:i:s');



    $id = R::store($usuario);
    R::close();

    echo "Usuário root criado com sucesso";     
    header('Location: ../front-end/pages/admin/adminPainel.php');
    return $id;
    exit;
} else {
    echo "Usuário Root ja criado no sistema";
}
