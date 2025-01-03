<?php
    include "Database.php";
    session_start();

    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO restaurant (R_ID, Name, Email, Phone,Review, U_ID) Values (NULL,?,?,?,NULL,?)");
    $stmt->execute([$n,$e,$p,$_SESSION['user_id']]);
    header("Location: branches.php")
?>