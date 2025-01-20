<?php
/*
require 'rb.php';
R::setup('mysql:host=localhost;dbname=seu_banco', 'usuario', 'senha');

// Buscar todas as reservas com suas relações
$reservas = R::findAll('reserva', ' ORDER BY data_reserva ASC, hora_inicio ASC');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Reservas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Lista de Reservas</h2>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Horário</th>
                <th>Sala</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($reservas) {
                foreach($reservas as $reserva) {
                    // Carregando as relações
                    $sala = $reserva->sala;
                    $usuario = $reserva->usuario;
                    
                    // Formatando data e hora
                    $data = date("d/m/Y", strtotime($reserva->data_reserva));
                    $horario = date("H:i", strtotime($reserva->hora_inicio)) . " - " . 
                              date("H:i", strtotime($reserva->hora_fim));
                    ?>
                    <tr>
                        <td><?php echo $data; ?></td>
                        <td><?php echo $horario; ?></td>
                        <td><?php echo htmlspecialchars($sala->nome); ?></td>
                        <td><?php echo htmlspecialchars($usuario->nome); ?></td>
                        <td>
                            <a href="editar_reserva.php?id=<?php echo $reserva->id; ?>">Editar</a>
                            <a href="excluir_reserva.php?id=<?php echo $reserva->id; ?>" 
                               onclick="return confirm('Tem certeza que deseja excluir esta reserva?');">
                                Excluir
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhuma reserva encontrada</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
R::close();
?>
<?php
// Inclui o RedBean
require 'rb.php';

// Configuração da conexão com o banco
R::setup('mysql:host=localhost;dbname=sistema_reservas', 'seu_usuario', 'sua_senha');

// Habilita o modo debug (remova em produção)
R::debug(true);

// Criando o modelo de Usuário
function criarUsuario($nome, $email, $senha) {
    $usuario = R::dispense('usuario');
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->senha = password_hash($senha, PASSWORD_DEFAULT); // Sempre hash na senha!
    $usuario->created_at = date('Y-m-d H:i:s');
    
    $id = R::store($usuario);
    return $id;
}

// Criando o modelo de Reserva
function criarReserva($usuario_id, $data_reserva, $hora_inicio, $hora_fim) {
    $reserva = R::dispense('reserva');
    $reserva->data_reserva = $data_reserva;
    $reserva->hora_inicio = $hora_inicio;
    $reserva->hora_fim = $hora_fim;
    
    // Vincula o usuário à reserva
    $reserva->usuario = R::load('usuario', $usuario_id);
    
    $id = R::store($reserva);
    return $id;
}

// Função para buscar usuário por email (login)
function buscarUsuarioPorEmail($email) {
    return R::findOne('usuario', ' email = ? ', [$email]);
}

// Função para verificar login
function fazerLogin($email, $senha) {
    $usuario = buscarUsuarioPorEmail($email);
    
    if ($usuario && password_verify($senha, $usuario->senha)) {
        // Inicia a sessão e guarda informações do usuário
        session_start();
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        return true;
    }
    
    return false;
}

// Exemplo de uso:
try {
    // Criar um novo usuário
    $usuario_id = criarUsuario('João Silva', 'joao@email.com', 'senha123');
    
    // Criar uma nova reserva
    $reserva_id = criarReserva(
        $usuario_id,
        '2024-01-20', // data
        '14:00:00',   // hora início
        '15:00:00'    // hora fim
    );
    
    // Buscar todas as reservas de um usuário
    $reservas_usuario = R::find('reserva', ' usuario_id = ? ', [$usuario_id]);
    
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

// Sempre feche a conexão no final
R::close();
?>