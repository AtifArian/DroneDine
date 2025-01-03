<?php
include "Database.php"; // Include database connection
session_start();
$_SESSION["email"] = trim($_POST['email']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    try {
        // Prepare the database query
        $stmt = $conn->prepare("SELECT * FROM user WHERE E_mail = ?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $r = $stmt->get_result();
        $row = $r->fetch_assoc();

        if ($row) {
            // If match is found
            echo "Information matched. Proceed to reset password.";
            header("Location: reset.php");
            // Redirect or handle password reset logic here
        } else {
            // If no match is found
            echo "Error: No matching user found with the provided information.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
