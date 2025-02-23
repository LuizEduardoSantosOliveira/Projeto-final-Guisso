<?php
if (session_start() == PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION['email']);
unset($_SESSION['type']);
session_destroy();

header('Location: ../front-end/pages/login.php');
exit;
