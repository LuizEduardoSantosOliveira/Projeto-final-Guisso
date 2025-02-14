
<?php
require_once 'class/rb.php';
if (!R::testConnection()) {
    R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');

    if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
    }
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$usuarioValido = R::findOne('usuario', 'email = ? AND senha = ? AND tipo = ?', [$_GET['email'], $_GET["password"], 'admin']);


if (!$usuarioValido) {
    header("Location: ../front-end/pages/usuario/home.php");
    $_SESSION['email'] = $_GET['email'];
    exit();
} else {
    $_SESSION['type'] = $usuarioValido -> tipo;
    $_SESSION['email'] = $_GET['email'];
    header("Location: ../front-end/pages/admin/adminPainel.php");
    exit();
}
