<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



// Verificar se usuário está logado
if (!isset($_SESSION['name'])) {
    header('Location: ' . LOGIN_PATH);
    exit;
}
?>