<?php

require_once '../back-end/class/rb.php';  
include  '../inc/validacao.php';


if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', 'root');
    
    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

    if (isset($_SESSION['name'])) {
        
        $usuario = R::dispense('usuario');
        $usuario->nome = $_SESSION['name'];  
        //$usuario->email = $email;
        $usuario->created_at = date('d-m-y H:i:s');

        
        $id = R::store($usuario);  
        

        header('Location: ../front-end/pages/usuario/calendario.php');
        return $id; 
        exit;
    } 

    

?>