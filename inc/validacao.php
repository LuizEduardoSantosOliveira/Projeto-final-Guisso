<?php


if (!isset($_SESSION['name'])){
   header('Location: ../usuario/login.php');
   exit;
}

?>
