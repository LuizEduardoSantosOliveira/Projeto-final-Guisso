<?php
require  './class/rb.php';

require 'criacaoUsuario.php'; // Incluindo o arquivo de criação de usuário

// Configurando a conexão com o banco de dados
R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

function criarReserva($data_reserva, $hora_inicio, $hora_fim, $usuario_id, $ambiente)
{
    // Criando a reserva
    $reserva = R::dispense('reserva');
    $reserva->data_reserva = $data_reserva;
    $reserva->hora_inicio = $hora_inicio;
    $reserva->hora_fim = $hora_fim;
    $reserva->ambiente = $ambiente;

    // Verificando o usuário
    $usuario = R::load('usuario', $usuario_id);
    if (!$usuario->id) {
        throw new Exception("Usuário não encontrado");
    }
    $reserva->usuario = $usuario;

    // Salvando a reserva no banco
    $id = R::store($reserva);
    return $id;
}

try {
    $usuario_id = 1; // Altere para um ID de usuário válido
    $reserva_id = criarReserva('2025-01-20', '14:00:00', '15:00:00', $usuario_id, 'Lab B');
    echo "Reserva criada com sucesso. ID: $reserva_id<br>";

    $reserva_id = criarReserva('2025-08-10', '18:30:00', '20:00:00', $usuario_id, 'Lab A');
    echo "Reserva criada com sucesso. ID: $reserva_id<br>";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
