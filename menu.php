<?php
    include 'Database.php'; 
    session_start();
    if (isset($_GET['R_ID'])) {
        $_SESSION['R_ID'] = $_GET['R_ID'];
        $R_ID = $_GET['R_ID'];
        echo "You are working with restaurant ID: " . $R_ID;
    }
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
            <li><a href="My_Restaurants.php">My Restaurants</a></li>
            <!-- <li><a href="branches.php?r_id=<?php echo $R_ID ?>">Manage Branches</a></li> -->
            <li><a href="branches.php?r_id=<?php echo $_SESSION['R_ID']; ?>">Manage Branches</a></li>
            <li><a href="logout.php">Log Out</a></li>
            
        </ul>
    </div>
    <div class="main">
        <h1>Manage Menu</h1>
        <form action="menu.php" method="POST">
            <input type="text" name="name" placeholder="Dish Name" required>
            <input type="text" name="categ" placeholder="Category" required>
            <input type="number" name="price" placeholder="Price" step="0.01" required>
            <input type="number" name="discount" placeholder="Discount (%)" step="0.01">
            <button type="submit" name="add">Add Item</button>
        </form>
        <hr>
        <h2>Menu Items</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                
            </tr>
            <?php
            if (isset($_POST['add'])) {
                $stmt = $conn->prepare("INSERT INTO menu (Item_ID,Name,Category, Price,R_ID) VALUES ( NULL,?,?, ?, ?)");
                $stmt->execute([$_POST['name'], $_POST['categ'], $_POST['price'],$_SESSION['R_ID']]);
                header("Location: menu.php?R_ID={$_SESSION['R_ID']}");
            }

            if (isset($_GET['delete'])) {
                $item_id = intval($_GET['delete']);
            
                if ($item_id > 0){
                    $stmt = $conn->prepare("DELETE FROM menu WHERE Item_ID = ? AND R_ID = ?");
                    $stmt->execute([$item_id, $_SESSION["R_ID"]]);
                    header("Location: menu.php?R_ID={$_SESSION['R_ID']}");
                }
            }

            $stmt = $conn->prepare("SELECT * FROM menu WHERE R_ID = ?");
            $stmt->bind_param("i",$_SESSION['R_ID']);
            $stmt->execute();
            $a = $stmt->get_result();
            while ($row = $a->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Item_ID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Price']}</td>
                        <td>
                            <a href='menu.php?delete={$row['Item_ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
