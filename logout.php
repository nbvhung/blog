<?php
    require "./includes/init.php";

    // $_SESSION['logged_in'] = false;
    
    Auth::logout();

    header("Location: index.php");
?>