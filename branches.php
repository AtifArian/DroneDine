<?php
    include 'Database.php';
    session_start();
    $me = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Branches</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="sidebar">
        <h2>Restaurant Admin</h2>
        <ul>
            <li><a href="My_Restaurants.php">My Restaurants</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="main">
        <h1>Manage Branches</h1>
        <form action="branches.php" method="POST">
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit" name="add">Add Branch</button>
        </form>
        <hr>
        <h2>Branches</h2>
        <table>
            <tr>
                <th>Locations</th>
                <th>Actions</th>
            </tr>
            <?php
            // if (isset($_POST['add'])) {
            //     $stmt = $conn->prepare("INSERT INTO branch (R_ID, Branch_loc) VALUES (?, ?)");
            //     $stmt->execute([$_GET['R_ID'],$_POST['location']]);
            // }
            if (isset($_POST['add'])) {
                $location = $_POST['location'];
            
                // Check if the branch already exists

                // Prepare the query to check if the branch exists
                $checkStmt = $conn->prepare("SELECT COUNT(*) FROM branch WHERE R_ID = ? AND Branch_loc = ?");
                $checkStmt->execute([$_SESSION["R_ID"], $location]);

                // Fetch the result
                $branchExists = $checkStmt->get_result();
                $check = $branchExists->fetch_assoc(); // Fetch the count

                // Check if the count is greater than 0 (meaning the branch already exists)
                if ($check['COUNT(*)'] > 0) {
                    // Branch already exists
                    echo "<p style='color:red;'>Branch already exists in this location!</p>";
                }

                 else {
                    // Insert the branch as it doesn't exist
                    $stmt = $conn->prepare("INSERT INTO branch (R_ID, Branch_loc) VALUES (?, ?)");
                    $stmt->execute([$_SESSION["R_ID"], $location]);
                    echo "<p style='color:green;'>Branch added successfully!</p>";
                }
            }
            

            if (isset($_GET['delete'])) {
                $stmt = $conn->prepare("DELETE FROM branch WHERE R_ID = ? AND Branch_loc = ?");
                $stmt->execute([$_SESSION['R_ID'],$_GET['delete']]);
            }
                $r_id = $_SESSION['R_ID'];
            $stmt = $conn->query("SELECT * FROM branch WHERE R_ID=$r_id");
            while ($row = $stmt->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Branch_loc']}</td>
                        <td>
                            <a href='branches.php?delete={$row['Branch_loc']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
