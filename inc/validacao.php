<?php


 if (!isset($_SESSION['name'])){
     header('Location: ./index.php');

     exit;  
 }

 if (isset($_GET['name'])){
   echo '<p>' . $_GET['name'] . '</p>';
   echo "<a href='logout.php'></a>";

}   
?>


