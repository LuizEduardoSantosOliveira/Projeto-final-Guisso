<?php
    if(session_start() == PHP_SESSION_NONE){
        session_start();
    }
    

    $_SESSION['name'] = $_GET['name'];
    header('Location:../front-end/calendario.php');





?>