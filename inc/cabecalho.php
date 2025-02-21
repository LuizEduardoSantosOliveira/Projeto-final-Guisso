
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('America/Sao_Paulo');


if (isset($_SESSION['email'])) {
    require_once '../../../back-end/class/rb.php';
    $paginaAtual = basename($_SERVER['PHP_SELF']);

    if ($_SESSION['type'] === "admin") {
        if ($paginaAtual !== 'adminPainel.php') {
            echo '<a href="../../../front-end/pages/admin/AdminPainel.php">Home</a>';
        }
    } else {
        if ($paginaAtual !== 'home.php') {
            echo '<a href="../../../front-end/pages/usuario/home.php">Home</a>';
        }
    }

    if (!R::testConnection()) {

        R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

        if (!R::testConnection()) {
            die('Falha na conexão com o banco de dados');
        }
    }

    $usuario = R::findOne('usuario', 'email = ? ', [$_SESSION['email']]);
    $_SESSION['name'] = $usuario->nome;
    echo '<h1>Login: ' . strtoupper($_SESSION['name']) . '</h1>';
    echo '<a href="../../../back-end/logout.php">Sair</a>';;
}



?>

