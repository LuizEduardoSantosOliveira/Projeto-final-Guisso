<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['type'])) {
    if($_SESSION['type'] != "admin"){
        header('Location: ../usuario/login.php');
        exit;
    }   
  
}


?>