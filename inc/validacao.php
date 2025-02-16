<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



// Verificar se usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location:  ../../../front-end/pages/usuario/login.php' );
    exit;
}
?>