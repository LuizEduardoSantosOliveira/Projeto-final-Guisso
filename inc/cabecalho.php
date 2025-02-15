
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$paginaAtual = basename($_SERVER['PHP_SELF']);


if ($paginaAtual !== 'home.php') {
    echo '<a href="../../../front-end/pages/usuario/home.php">Home</a>';
}



if (isset($_SESSION['email'])) {
    require_once '../../../back-end/class/rb.php';

    if (!R::testConnection()) {
        
     R::setup('mysql:host=localhost;dbname=sistema_reservas', 'root', '');
     $usuario = R::findOne('usuario', 'email = ? ', [$_SESSION['email']]);
     echo '<h1>Login: ' . strtoupper($usuario-> nome) . '</h1>';

     echo '<a href="../../../back-end/logout.php">Sair</a>';

     if (!R::testConnection()) {
        die('Falha na conexão com o banco de dados');
        
 }
       
        
    }
     
    
      
    
 }





?>

