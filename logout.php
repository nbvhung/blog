<?php
    require "./class/Auth.php";

    session_start();

    // $_SESSION['logged_in'] = false;
    
    Auth::logout();

    header("Location: myblog.php");
?>