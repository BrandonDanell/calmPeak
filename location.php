<?php
    session_start();
    if (isset($_SESSION['locations'])) {
        unset($_SESSION['locations']);
      } 
    $locationsJSON = $_POST['location'];
    unset($_POST['location']);
    $locations = json_decode($locationsJSON, true);
    $_SESSION['locations'] = $locations;
    header('Refresh:0; url=../index.php');
?>