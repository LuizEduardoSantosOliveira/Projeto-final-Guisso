<?php

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
if (!isset($_SESSION['name'])){
   header('Location: ../front-end/pages/usuario/login.php');
   exit;
}

?>
