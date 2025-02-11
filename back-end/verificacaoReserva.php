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
    $reserva = R::findOne('reserva', 'data_reserva = ?', [$_GET['date']]);

if (!$reserva) {
    $category = urlencode($_GET['category']); 
    $ambient = urlencode($_GET['ambient']);
    $date = $_GET['date'];
    header("Location: salvarreserva.php?category=" . $category . "&ambient=" . $ambient .  "&date=" . $date);
    exit(); 
}else{
    header("Location: ../front-end/pages/usuario/calendario.php?erro=reserva já existente");
    exit();
}



?>