<?php
require '../../../back-end/class/rb.php';
include '../inc/validacao.php';
include 'salvarUsuario.php';
include 'salvarReserva';

// Inicia a sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
}

// Configuração da conexão com o banco de dados
R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
if (!R::testConnection()) {
    die('Falha na conexão com o banco de dados');
}

// Busca o usuário atual
$usuario = R::findOne('usuario', 'nome = ?', [$_SESSION['name']]);

// Busca todas as reservas do usuário atual
$reservas = R::find('reserva', 'nome = ?', [$_SESSION['name']]);

?>