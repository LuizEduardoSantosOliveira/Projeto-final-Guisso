<?php
session_start();
require_once '../back-end/class/rb.php';
include  '../inc/validacao.php';


if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}

date_default_timezone_set('America/Sao_Paulo');


$usuario = R::dispense('usuario');
$usuario->nome = $_GET["name"];
$usuario->email = $_GET["email"];
$usuario->senha = $_GET["password"];
$usuario->tipo = $_GET["type"];
$usuario->criado_em = date('Y-m-d H:i:s');


$id = R::store($usuario);
R::close();

header('Location: ../front-end/pages/admin/todosUsuarios.php');
return $id;
exit;
