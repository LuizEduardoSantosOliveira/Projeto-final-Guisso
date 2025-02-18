<?php
    require_once("class/rb.php");
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

    if(isset($_GET['id'])){

        for ($i=7; $i<=21; $i++) { 
            $hora = sprintf('hora%d', $i);
            if(isset($_GET[$hora])){
                $horas[] = $_GET[$hora]; 
            }
        }

        $reserva = R::load('reserva', $_GET['id']);
        $reserva->id = $_GET['id'];
        $reserva->ambiente_id = $_GET['ambiente'];
        $reserva->horas = json_encode($horas);
        $usuario = R::findOne('usuario', 'email=?', [$_SESSION['email']]);
        if (!$usuario) {
            throw new Exception("Usuário não encontrado");
        }
        $reserva->usuario_id = $usuario -> id;

        R::store($reserva);
    }
?>