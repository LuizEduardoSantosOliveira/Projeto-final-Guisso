<?php

require_once './class/rb.php';
include  '../inc/validacaodata.php';
include  '../inc/validacao.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if (isset($_SESSION['email'])) {

    for ($i=7; $i<=21; $i++) { 
        $hora = sprintf('hora%d', $i);
        if(isset($_GET[$hora])){
            $horas[] = $_GET[$hora]; 
        }
    }

    foreach($horas as $horac){
        echo $horac;
    }

    $reserva = R::dispense('reserva');
    $reserva->data_reserva = $_GET['date'];
    $reserva->horas = json_encode($horas);
    $usuario = R::findOne('usuario', 'email=?', [$_SESSION['email']]);
    if (!$usuario) {
        throw new Exception("Usuário não encontrado");
    }
    
    $reserva->usuario_id = $usuario -> id;
    $reserva -> reservante = $_SESSION['name'];
    $reserva->ambiente_id = $_GET['ambiente'];
    $id_reserva = R::store($reserva);
    R::close();

    header('Location: ../front-end/pages/usuario/reservasUsuario.php');
    return $id_reserva;

}
