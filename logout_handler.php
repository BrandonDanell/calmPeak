<?php
    session_start();

    header('Location: ../index.php');
    unset($_SESSION['loginStatus']);
    session_destroy();
    exit;

?>