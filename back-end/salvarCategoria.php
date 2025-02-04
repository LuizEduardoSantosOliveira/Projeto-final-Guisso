<?php
// Incluindo o RedBean
require_once './class/rb.php';  // Substitua pelo caminho correto
include  '../inc/validacao.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
 }

R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', 'aluno');  // Substitua pelas suas credenciais

if (!R::testConnection()) {
    die('Falha na conexão com o banco de dados');
}


{
   
    if (isset($_SESSION['name'])) {
        
        $categoria = R::dispense('categoria');
        $categoria->nome = $_GET['name'];  
        $categoria ->descricao = $_GET["description"];

        
        $id = R::store($categoria);  
        return $id;
    } else {
        throw new Exception("Nome do usuário não encontrado na sessão.");
    }
}
?>