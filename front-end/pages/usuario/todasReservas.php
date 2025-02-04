<?php
include './class/rb.php';
include '../inc/validacaodata.php';
include '../inc/validacao.php';


// Verifica se o usuário está logado
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
}

// Busca todas as reservas com seus usuários relacionados
$reservas = R::findAll('reserva');
?>
