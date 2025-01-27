<?php


 if (!isset($_SESSION['name'])){
     header('Location: ../../../front-end/pages/usuario/login.php');

     exit;  
 }

 if (isset($_GET['name'])){
   echo '<p>' . $_GET['name'] . '</p>';
   echo "<a href='../back-end/logout.php'></a>";

}   
?>


