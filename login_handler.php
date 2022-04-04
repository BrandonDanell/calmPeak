<?php
    session_start();
    require_once '../Dao.php';
    $dao = new Dao();
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php");
        $_SESSION['bad-email'] = "Invalid email format";
        exit;
        
    }
    if($dao->checkLogin($_POST['email'], $_POST['password'])) {
        header('Location: ../index.php');
        $_SESSION['user-email'] = $_POST['email'];
        $_SESSION['post'] = $_POST;
        $_SESSION['loginStatus'] = true;
        unset($_SESSION['loginFailed']);
        exit;
    } else {
        header('Location: ../index.php');
        $_SESSION['post'] = $_POST;
        unset($_SESSION['loginStatus']);
        $_SESSION['loginFailed'] = "Couldn't log you in. Please try again.";
        exit;
    }
?>