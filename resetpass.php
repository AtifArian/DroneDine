<?php

    include('Database.php');
    session_start();

    //$stmt = $conn->prepare("UPDATE user  SET Pass = ?  WHERE E_mail = ?");
    //$stmt->execute([$_POST["newpass"],$_SESSION['email']]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: Arial, sans-serif;
    font-size: large;
    background-color: #f8f9fa;
    margin: 0;
    height: 100vh; /* Set the height of the body to the viewport height */
    display: flex; /* Enable flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    text-align: center;
}

.main.ok {
    background-color: rgba(245, 245, 220, 0.514);
    padding: 50px;
    height: auto;
    width: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Adds a subtle shadow for aesthetics */
    border-radius: 10px; /* Optional: Adds rounded corners */
}

form button {
  width: 200px;
  height: 50px;
  top: auto;
  left: 10px;
  background-color: #0096ffb8;
  border-radius: 5px;
}

    </style>
</head>
<body>
    <section class="main">
        <form class="ok" action="Log_In.php">
            <div class="msg">
                New Password Set!
                <?php session_unset() ?>
            </div><br><br>
            <button>Okay</button>
        </form>
    </section>
</body>
</html>