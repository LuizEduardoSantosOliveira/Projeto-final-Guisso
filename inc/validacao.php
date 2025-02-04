<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define o caminho absoluto para a página de login
define('LOGIN_PATH', '/projeto-final-guisso/front-end/pages/usuario/login.php');

// Verificar se usuário está logado
if (!isset($_SESSION['name'])) {
    header('Location: ' . LOGIN_PATH);
    exit;
}
?>