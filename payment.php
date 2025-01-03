<?php
include "Database.php";
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];


$totalAmount = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="menu.css" />
</head>
<body>
    <div class="container">
        <h1>Payment Page</h1>

        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach ($cart as $itemName => $quantity) {
                        
                        if (isset($itemPrices[$itemName])) {
                            $price = $itemPrices[$itemName];
                            $itemTotal = $quantity * $price;
                            $totalAmount += $itemTotal;          
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($itemName) . "</td>";
                            echo "<td>" . htmlspecialchars($quantity) . "</td>";
                            echo "<td>$" . number_format($price, 2) . "</td>";
                            echo "<td>$" . number_format($itemTotal, 2) . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="total">
            <?php echo "Total Amount: $" . number_format($totalAmount, 2); ?>
        </div>

        <a href="review.php" class="btn">Pay Now</a>
    </div>
</body>
</html>