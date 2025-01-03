<?php
session_start();
include "Database.php";
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

$categoryQuery = "SELECT DISTINCT Category FROM menu";
$categoryResult = $conn->query($categoryQuery);

// Get the selected category or default to 'all'
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

// Fetch menu items based on the selected category
if ($selectedCategory === 'all') {
    $menuQuery = "SELECT * FROM menu";
    $menuStmt = $conn->prepare($menuQuery);
} else {
    $menuQuery = "SELECT * FROM menu WHERE Category = ?";
    $menuStmt = $conn->prepare($menuQuery);
    $menuStmt->bind_param("s", $selectedCategory);
}

$menuStmt->execute();
$menuResult = $menuStmt->get_result();


$menuQuery = "SELECT Category, Name, Price FROM menu";
$menuResult = $conn->query($menuQuery);
$menuItems = [];
if ($menuResult) {
    while ($row = $menuResult->fetch_assoc()) {
        $menuItems[$row['Category']][] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css" />
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
        <h1>MENU</h1>
    </div>
    <form method="GET" action="">
        <label for="category">Choose a category:</label>
        <select id="category" name="category" onchange="this.form.submit()">
            <option value="all">All</option>
            <?php if ($categoryResult->num_rows > 0): ?>
                <?php  while ($row = $categoryResult->fetch_assoc()): ?>
                    <option value="<?php  echo htmlspecialchars($row['Category']); ?>">
                        <?php echo htmlspecialchars($row['Category']); ?>
                    </option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </form>

    <div id="menu-container">
        <?php foreach ($menuItems as $category => $items): ?>
            <div class="menu-section">
                <h3><?php echo htmlspecialchars($category); ?></h3>
                <?php foreach ($items as $item): ?>
                    <div class="menu-item">
                        <span>
                            <?php echo htmlspecialchars($item['Name']); ?> - TK.<?php echo htmlspecialchars($item['Price']); ?>
                        </span>
                        <div>
                            <form method="post" action="">
                                <input type="hidden" name="itemName" value="<?php echo htmlspecialchars($item['Name']); ?>">
                                <input type="hidden" name="quantity" value="-1">
                                <button type="submit">-</button>
                            </form>
                            <form method="post" action="">
                                <input type="hidden" name="itemName" value="<?php echo htmlspecialchars($item['Name']); ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit">+</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>