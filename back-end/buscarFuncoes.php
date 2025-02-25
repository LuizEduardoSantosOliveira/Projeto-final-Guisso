<?php
    require_once '../../../back-end/class/rb.php';

    include  '../../../inc/validacao.php';
    
    if (!R::testConnection()) {
        R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
    
        if (!R::testConnection()) {
            die('Falha na conexão com o banco de dados');
        }
    }

    function buscarUsuario($id){
        $usuario = R::findone('usuario', 'id = ?', [$id]);
        return $usuario;
    }

    function buscarCategoria($id){
        $categoria = R::findone('categoria', 'id = ?', [$id]);
        return $categoria;
    }

    function buscarAmbiente($id){
        $ambiente = R::findone('ambiente', 'id = ?', [$id]);
        return $ambiente;
    }

    function buscarUsuarioEmail($email){
        $usuario = R::findone('usuario', 'email = ?', [$email]);
        return $usuario;
    }
?>