<?php
include 'Database.php';

// Fetch categories for the dropdown
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <!-- Category Dropdown -->
    <form method="GET" action="">
        <select name="category" onchange="this.form.submit()">
            <option value="all" <?php echo $selectedCategory === 'all' ? 'selected' : ''; ?>>All</option>
            <?php if ($categoryResult->num_rows > 0): ?>
                <?php while ($row = $categoryResult->fetch_assoc()): ?>
                    <option value="<?php echo htmlspecialchars($row['Category']); ?>" 
                        <?php echo $selectedCategory === $row['Category'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['Category']); ?>
                    </option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </form>

    <!-- Menu Items -->
    <div id="menu-container">
        <?php if ($menuResult->num_rows > 0): ?>
            <?php while ($row = $menuResult->fetch_assoc()): ?>
                <div class="menu-item">
                    <h3><?php echo htmlspecialchars($row['Name']); ?></h3>
                    <p>Price: <?php echo htmlspecialchars($row['Price']); ?></p>
                    <p>Category: <?php echo htmlspecialchars($row['Category']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No items available in this category.</p>
        <?php endif; ?>
    </div>
</body>
</html>
