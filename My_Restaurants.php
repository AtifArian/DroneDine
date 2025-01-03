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
    <title>Manage Menu</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="sidebar">
        <h2>Restaurant Admin</h2>
        <ul>
            <li><a href="branches.php">Manage Branches</a></li>
            <li><a href="logout.php">Log Out</a></li>
            
        </ul>
    </div>
    <div class="main">
        <h1>Manage Restaurants</h1>
        <form action="add_res.php" method="POST">
            <button type="submit" name="add">Open New Restaurant</button>
        </form>
        <hr>
        <h2>Menu Items</h2>
        <table>
            <tr>
                <th>R_ID</th>
                <th>Name</th>
                <th>Location</th>    
                <th> Operation</th>         
            </tr>
            <?php
            if (isset($_GET['delete'])) {
                $stmt = $conn->prepare("DELETE FROM restaurant WHERE R_ID = ?");
                $stmt->execute([$_GET['delete']]);
            }
            $gpt = "SELECT r.R_ID as r_id, r.Name as name, b.Branch_loc as loc
            FROM restaurant r
            JOIN branch b ON r.R_ID = b.R_ID";
            $stmt = $conn->query($gpt);

            while ($row = $stmt->fetch_assoc()) {
                echo "<tr>
                        <td>
                            {$row['r_id']}
                        </td>
                        <td>
                            <a href='menu.php'? R_ID={$row['r_id']}>{$row['name']}</a>
                        </td>
                        <td>
                            {$row['loc']}
                        </td>
                        <td>
                            <a href='My_Restaurants.php?delete={$row['r_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>