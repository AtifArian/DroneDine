<?php
require_once('Database.php');
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE E_mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        // Verify the password
        if ($password == $user["Pass"]) {
            // Store user information in session variables
            $_SESSION['user_id'] = $user['U_ID'];
            $_SESSION['user_email'] = $user['E_mail'];
            $_SESSION['logged_in'] = true;
            $_SESSION['location'] = $user['Area'];
            // Redirect to another page
            if ($user['A_Flag'] == 1){
                header("Location: admin.php");
            }
            elseif ($user['A_Flag'] == 0){
                header("Location: SearchBox.php");
            }
            exit();
        } else {
            echo "Wrong username or password";
        }
    } else {
        echo "Wrong username or password";
    }

    
}
?>
