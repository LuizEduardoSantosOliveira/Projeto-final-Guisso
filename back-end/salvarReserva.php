<?php

include './class/rb.php';
include  '../inc/validacaodata.php';
include  '../inc/validacao.php';

if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
    
    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}
    
  
    if (isset($_SESSION['name'])) {
        $reserva = R::dispense('reserva');
        $reserva->data_reserva = $_GET['date'];
        //$reserva->hora_inicio = $hora_inicio;
        //$reserva->hora_fim = $hora_fim;
        $reserva->nome = $_SESSION['name'];  
        $reserva->categoria  = $_GET["category"];

        $ambiente_id = $_GET['ambient'];
        $ambiente = R::load('ambiente', $ambiente_id);
        $reserva -> ambiente = $ambiente -> nome;
        
       

        
        $usuario = R::findOne('usuario', 'nome = ?', [$_SESSION['name']]);  
        if (!$usuario) {
            throw new Exception("Usuário não encontrado");
        }

        
        $reserva->usuario = $usuario;
        $id_reserva = R::store($reserva);  
        R::close();

    
        
        header('Location: ../front-end/pages/usuario/reservasUsuario.php?');
        return $id_reserva;
    } 

?>