<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('America/Sao_Paulo');


if (isset($_SESSION['email'])) {
    require_once '../../../back-end/class/rb.php';
    if (!R::testConnection()) {
        R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
        if (!R::testConnection()) {
            die('Falha na conexão com o banco de dados');
        }
    }

    $paginaAtual = basename($_SERVER['PHP_SELF']);
    $usuario = R::findOne('usuario', 'email = ? ', [$_SESSION['email']]);
    $_SESSION['name'] = $usuario->nome;

    echo '<div class="header-login">';
    echo '<h1 class="username"><i class="fa-solid fa-user"></i> ' . strtoupper($_SESSION['name']) . '</h1>';
    echo '<a class="logout" href="../../../back-end/logout.php">Sair</a>';
    
    if ($_SESSION['type'] === "admin") {
        if ($paginaAtual !== 'adminPainel.php') {
            echo $_SESSION['type'];
            echo '<a class="home-link" href="../../../front-end/pages/admin/adminPainel.php"><i class="fa-solid fa-house"></i></a>';
        }
    } else {
        if ($paginaAtual !== 'home.php') {
            echo $_SESSION['type'];
            echo '<a class="home-link" href="../../../front-end/pages/usuario/home.php"><i class="fa-solid fa-house"></i></a>';
        }
    }
    
    echo '</div>';
}
?>
