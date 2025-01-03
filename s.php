<?php
    session_start();
    echo $_SESSION['location'];
    header("Location: logout.php")
?>