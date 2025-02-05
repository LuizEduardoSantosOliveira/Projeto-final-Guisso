<?php
    if(session_start() == PHP_SESSION_NONE){
        session_start();
    }
    
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        // Salvar o nome na sessão
        $_SESSION['name'] = $_GET['name'];
    
        // Redirecionar para a página de reservas após o login
        
        header('Location: salvarUsuario.php');
        exit;
    } else {
        echo "Nome não informado!";
    }

?>
