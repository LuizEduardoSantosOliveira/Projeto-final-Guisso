<?php
require_once  '../../../back-end/class/rb.php';
include '../../../inc/validacao.php';

if (!R::testConnection()) {
R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

if (!R::testConnection()) {
die('Falha na conexão com o banco de dados');
}
}

function verificarHorario($data, $hora, $ambiente){
    $data = DateTime::createFromFormat('Y-m-d', $data);
    $dataString = $data->format('Y-m-d');
    $reservas = R::find('reserva', 'data_reserva=? and ambiente_id=?', [$dataString, $ambiente]);
    foreach($reservas as $reserva){
        $reservaHoras = json_decode($reserva->horas);
        foreach($reservaHoras as $reservaHora){
            if($reservaHora == $hora){
                return true;
            }
        }
    }
    return false;
}
?>