<?php
// Incluindo o RedBean
require_once './class/rb.php';  // Substitua pelo caminho correto
include  '../inc/validacao.php';

session_start();

R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');  // Substitua pelas suas credenciais

if (!R::testConnection()) {
    die('Falha na conexão com o banco de dados');
}


{
    // Verifica se o nome está na sessão
    if (isset($_SESSION['name'])) {
        // Criando um novo usuário no banco de dados
        $usuario = R::dispense('usuario');
        $usuario->nome = $_SESSION['name'];  // Pegando o nome da sessão
        //$usuario->email = $email;
        $usuario->created_at = date('Y-m-d H:i:s');

        // Salvando o usuário no banco de dados
        $id = R::store($usuario);  // Salvando o usuário na tabela 'usuario'
        return $id;  // Retorna o ID do usuário recém-criado
    } else {
        throw new Exception("Nome do usuário não encontrado na sessão.");
    }
}
?>