<?php
    include "Database.php";
    session_start();

    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['phone'];
    $l = $_POST['location'];

    $q = $conn->query("select max(R_ID) as r from branch");
    $a = $q->fetch_assoc();
    $new_r_id = $a['r']+1;

    $stmt = $conn->prepare("INSERT INTO restaurant (R_ID, Name, Email, Phone,Review, U_ID) Values (?,?,?,?,NULL,?)");
    $stmt->execute([$new_r_id,$n,$e,$p,$_SESSION['user_id']]);

    $stmt = $conn->prepare("INSERT INTO branch (R_ID, Branch_loc) Values (?,?)");
    $stmt->execute([$new_r_id,$l]);

    header("Location: My_Restaurants.php")
?>