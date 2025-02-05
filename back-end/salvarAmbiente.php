<?php
require_once './class/rb.php';
include '../inc/validacao.php';

// Conexão com o banco de dados
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', 'root');
    
    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

        $ambiente = R::dispense('ambiente');
        $ambiente->nome = $_GET['ambient'];
        $ambiente->descricao = $_GET['description'];
        
        $categoria = R::load('categoria', $_GET['category']);
        
        $ambiente->categoria = $categoria;
        
        $id_ambiente = R::store($ambiente);
        
        header('Location: ../front-end/pages/admin/todosAmbientes.php');
        exit();
        

 