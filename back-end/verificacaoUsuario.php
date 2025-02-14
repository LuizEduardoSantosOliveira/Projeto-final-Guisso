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
$usuario = R::findOne('usuario', 'email = ? ', [$_GET['email']]);


if (!$usuario) {
    $email = urlencode($_GET['email']);
    $password = urlencode($_GET['password']);
    $name = urlencode($_GET['name']);
    $type = urlencode($_GET['type']);
    header("Location: salvarUsuario.php?email=" . $email . "&password=" . $password .  "&name=" . $name . "&type=" . $type);
    exit();
} else {
    header("Location: ../front-end/pages/admin/cadastrarUsuario.php?erro=Usuário ja existente");
    exit();
}
