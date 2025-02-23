
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
$admin = R::findOne('usuario', 'email = ? AND senha = ? AND tipo = ?', [$_GET['email'], $_GET["password"], 'admin']);


if ($admin) {
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['type'] = $admin -> tipo;
    header("Location: ../front-end/pages/admin/adminPainel.php");
   
    exit();
} else {
  
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['type'] = "usuario";
    header("Location: ../front-end/pages/usuario/home.php");
    exit();
}
