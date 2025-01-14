<?php
if(session_start() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION['nome']);  
session_destroy(); 

header('Location: ../front-end/index.php');  
exit; 

?>
