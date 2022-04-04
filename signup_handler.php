<?php
    session_start();
    require_once '../Dao.php';
    $dao = new Dao();
    $_SESSION['post'] = $_POST;
    if($_POST['password1'] === $_POST['password2']) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php");
            $_SESSION['bad-email'] = "Invalid email format";
            exit;
            
        } else {
            $dao->signup($_POST['email'], $_POST['password1']);
            header("Location: ../index.php");
            $_SESSION['signup-success'] = "Welcome to Tapped In! again. cause you were already here.";
            exit;
        }
    } else {
        header("Location: ../index.php");
        $_SESSION['signup-failed'] = "Passwords don't match. Try again fumble-fingers.";
        exit;
    }
?>