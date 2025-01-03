<?php
include "Database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['pass']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $area = htmlspecialchars(trim($_POST['area']));
    $city = htmlspecialchars(trim($_POST['city']));
    $street = htmlspecialchars(trim($_POST['street']));
    $type = htmlspecialchars(trim($_POST['admin']));

    if ($type == 1){
        $C_ID = NULL;
        $sql = "Select MAX(A_ID) as x from user";
        $maxval = $conn->query($sql);
        $row = $maxval->fetch_assoc();
        $A_ID = $row["x"]+1;
        $C_Flag = false;
        $A_Flag = true;
    }
    elseif ($type== 0){
        $A_ID = NULL;
        $sql = "Select MAX(C_ID) as x from user";
        $maxval = $conn->query($sql);
        $row = $maxval->fetch_assoc();
        $C_ID = $row["x"]+1;
        $A_Flag = false;
        $C_Flag = true;
    }


    // SQL query to insert data
    $sql = "INSERT INTO user (U_ID, Name, E_mail, Pass, Phone, Area, City, Street,C_ID,A_ID,C_Flag,A_Flag) VALUES (NULL, ?, ?, ?,? , ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $name,
            $email,
            $password,
            $phone,
            $area,
            $city,
            $street,
            $C_ID,
            $A_ID,
            $C_Flag,
            $A_Flag
        ]);

        echo "<p>Account created successfully!</p>";
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
header("Location: log_in.php")
?>
