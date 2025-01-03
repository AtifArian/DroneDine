<?php
include "Database.php";
session_start();
$_SESSION["email"] = trim($_POST['email']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    try {

        $stmt = $conn->prepare("SELECT * FROM user WHERE E_mail = ?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $r = $stmt->get_result();
        $row = $r->fetch_assoc();

        if ($row) {
            echo "Information matched. Proceed to reset password.";
            header("Location: reset.php");

        } else {

            echo "Error: No matching user found with the provided information.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>