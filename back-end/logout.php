<?php
if(session_start() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION['nome']);  
session_destroy(); 

header('Location: ../front-end/pages/usuario/index.php');  
exit; 

?>
