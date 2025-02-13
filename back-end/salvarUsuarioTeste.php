<?php
    require_once 'class/rb.php';
    include '../inc/validacao.php';

    if (!R::testConnection()) {
        R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
        
        if (!R::testConnection()) {
            die('Falha na conexão com o banco de dados');
        }
    }

    if (isset($_GET['username']) && ($_GET['email']) && ($_GET['pwd'])) {
        # code...
    }
?>