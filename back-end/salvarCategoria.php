<?php
require_once './class/rb.php';
include '../inc/validacao.php';


if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

if(isset($_GET['id'])){
    $categoria = R::load('categoria', $_GET['id']);
    $categoria->nome = $_GET['category'];
    $categoria->descricao = $_GET['description'];
    R::store($categoria);
}else{
    $categoria = R::dispense('categoria');
    $categoria->nome = $_GET['category'];
    $categoria->descricao = $_GET['description'];
    $id = R::store($categoria);
}

R::close();
header('Location: ../front-end/pages/admin/todasCategorias.php');
exit();
