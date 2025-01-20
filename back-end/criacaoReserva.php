<?php
require 'rb.php';
R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
$reserva = R::dispense('reserva');
$reserva->data_reserva=$data_reserva;
$reserva->hora_inicio = $hora_inicio;
$reserva->hora_fim = $hora_fim;
$reserva->usuario = R::load('usuario',$usuario_id);
$id=R::store($reserva);
return $id;


?>
