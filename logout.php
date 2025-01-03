<?php
    //session_unset();
    //unset($_SESSION['email']);
    //session_destroy();
    session_start();
    session_destroy();
    header("Location: Log_In.php");
    exit;
?>