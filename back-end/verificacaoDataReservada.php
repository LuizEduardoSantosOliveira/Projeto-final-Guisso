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
    $dataHora = DateTime::createFromFormat('Y-m-d H:i:s', "$data $hora");
    $dataDT = $dataHora->format('Y-m-d');
    $horaDT = $dataHora->format('H:i:s');

    $dataHoraAtual = new DateTime('now');
    $horaAtual = $dataHoraAtual->format('H:i:s');
    $dataAtual = $dataHoraAtual->format('Y-m-d');

    if($dataHora <= $dataHoraAtual){
        return true;
    }       

    $reservas = R::find('reserva', 'data_reserva=? and ambiente_id=?', [$dataDT, $ambiente]);
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