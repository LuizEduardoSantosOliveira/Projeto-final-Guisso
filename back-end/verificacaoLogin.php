<?php
require_once 'class/rb.php';
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

$usuarioValido = R::findOne('usuario', 'email = ? AND senha = ? ', [$_GET['email'], $_GET["password"]]);

if ($usuarioValido) {
    $email = urlencode($_GET['email']);
    $password = urlencode($_GET['password']);
    header("Location: verificacaoAdmin.php?email=" . $email . '&password=' . $password);
    exit();
} else {
   header("Location: ../front-end/pages/usuario/login.php?erro=Usuário inválido");
    exit();
}
