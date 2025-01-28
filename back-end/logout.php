<?php
if(session_start() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION['name']);  
session_destroy(); 

header('Location: ../front-end/pages/usuario/login.php');  
exit; 

?>
