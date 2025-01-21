<?php
R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
if (!R::testConnection()) {
    die('Conexão com o banco falhou');
}

function criarUsuario($nome, $email, $senha)
{

    $usuario = R::dispense('usuario');
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->senha = password_hash($senha, PASSWORD_DEFAULT);
    $usuario->created_at = date('Y-m-d H:i:s');

    $id = R::store($usuario);
    return $id;
}
$usuario_id = criarUsuario('João Silva', 'joao@email.com', 'senha123');
$usuario_id = criarUsuario('Lucas Virginio', 'tchunga@email.com', 'oioi2324');
$usuario_id = criarUsuario('Heros Augusto', 'herosaugusto@email.com', 'senha321');
