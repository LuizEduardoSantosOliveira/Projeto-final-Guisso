<?php

include './class/rb.php';
include 'salvarusuario.php';
include  '../inc/validacaodata.php';
include  '../inc/validacao.php';





// Mostra o nome do usuário na sessão
if (isset($_SESSION['name'])) {
    echo "Nome do usuário na sessão: " . $_SESSION['name'];  
} else {
    echo "Nome do usuário não encontrado na sessão.";
}

// Função para criar a reserva


    // Verifique se o nome do usuário está na sessão
    if (isset($_SESSION['name'])) {
        // Criando a reserva
        $reserva = R::dispense('reserva');
        $reserva->data_reserva = $_GET['date'];
        //$reserva->hora_inicio = $hora_inicio;
        //$reserva->hora_fim = $hora_fim;
        //$reserva->categoria = $_GET['categoria'];

        $reserva->ambiente = $_GET['ambiente'];

        $reserva->nome = $_SESSION['name'];  // Nome obtido da sessão
        $id_reserva = R::store($reserva);  // Cria a reserva

        // Agora, busque o usuário pelo nome na sessão
        $usuario = R::findOne('usuario', 'nome = ?', [$_SESSION['name']]);  // Carrega o usuário pelo nome
        if (!$usuario) {
            throw new Exception("Usuário não encontrado");
        }

        // Associando o usuário à reserva
        $reserva->usuario = $usuario;

        // Salvando a reserva novamente, agora associada ao usuário
        $id_reserva = R::store($reserva);
        return $id_reserva;
    } else {
        throw new Exception("Nome do usuário não encontrado na sessão.");
    }

?>