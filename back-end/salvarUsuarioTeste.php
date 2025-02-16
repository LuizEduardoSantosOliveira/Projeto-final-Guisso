<?php
    require_once 'class/rb.php';
    include '../inc/validacao.php';

    if (!R::testConnection()) {
        R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
        
        if (!R::testConnection()) {
            die('Falha na conexão com o banco de dados');
        }
    }

    if (isset($_POST['username']) && ($_POST['email']) && ($_POST['pwd'])) {

        date_default_timezone_set('America/Sao_Paulo');

        $usuario = R::dispense('usuario');
        $usuario->nome = $_POST['username'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['pwd'];
        $usuario->dataCriacao = date('Y-m-d H-i-s');
        $id = R::store($usuario);

        R::close();
        header('location: ../front-end/pages/admin/todosUsuarios.php');
    }
?>