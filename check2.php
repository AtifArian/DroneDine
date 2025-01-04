<?php
session_start();
include "Database.php";
$my_id = $_GET["r_id"];
$my_res = $_GET["rname"];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['itemName']) && isset($_POST['quantity'])) {
    $itemName = $_POST['itemName'];
    $quantity = (int)$_POST['quantity'];

    if (isset($_SESSION['cart'][$itemName])) {
        $_SESSION['cart'][$itemName] += $quantity;
    } elseif ($quantity > 0) {
        $_SESSION['cart'][$itemName] = $quantity;
    }

    if (isset($_SESSION['cart'][$itemName]) && $_SESSION['cart'][$itemName] <= 0) {
        unset($_SESSION['cart'][$itemName]);
    }
}

function renderCart() {
    if (empty($_SESSION['cart'])) {
        echo 'No items in cart.';
    } else {
        foreach ($_SESSION['cart'] as $itemName => $quantity) {
            echo htmlspecialchars($itemName) . " x " . $quantity . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="check.css" />
    <title>Menu</title>
</head>
<body>
    <div class="cart">
        <h3>Cart</h3>
        <div id="cart-items">
            <?php renderCart(); ?>
        </div>
    </div>
    <form class="pay" action="payment.php">
        <button class="ment">
            Payment
        </button>
    </form> 

    <div class="menu-box">
        <div class='rname'><?php echo $my_res ?></div>
    </div>

    <div id="menu-container">
        <?php
        $categoryQuery = "SELECT DISTINCT Category FROM menu WHERE R_ID = ?";
        $categoryStmt = $conn->prepare($categoryQuery);
        $categoryStmt->bind_param("i", $my_id);
        $categoryStmt->execute();
        $categoryResult = $categoryStmt->get_result();

        while ($categoryRow = $categoryResult->fetch_assoc()) {
            $category = $categoryRow['Category'];
            echo "<div class='menu-section'>";
            echo "<h3>" . htmlspecialchars($category) . "</h3>";

            $menuQuery = "SELECT Name, Price FROM menu WHERE R_ID = ? AND Category = ?";
            $menuStmt = $conn->prepare($menuQuery);
            $menuStmt->bind_param("is", $my_id, $category);
            $menuStmt->execute();
            $menuResult = $menuStmt->get_result();

            echo "<table>";
            echo "<tr><th>Item</th><th>Price</th><th>Actions</th></tr>";
            while ($menuRow = $menuResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($menuRow['Name']) . "</td>";
                echo "<td>TK. " . htmlspecialchars($menuRow['Price']) . "</td>";
                echo "<td>
                        <form method='post' action='' style='display:inline;'>
                            <input type='hidden' name='itemName' value='" . htmlspecialchars($menuRow['Name']) . "'>
                            <input type='hidden' name='quantity' value='-1'>
                            <button type='submit'>-</button>
                        </form>
                        <form method='post' action='' style='display:inline;'>
                            <input type='hidden' name='itemName' value='" . htmlspecialchars($menuRow['Name']) . "'>
                            <input type='hidden' name='quantity' value='1'>
                            <button type='submit'>+</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>