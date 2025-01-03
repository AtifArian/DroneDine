<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <link rel="stylesheet" href="review.css" />
</head>
<body>
    <div class="container">
        <h1>Order Review</h1>
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
                // Sample data for demonstration
                $orderDetails = [
                    ["itemName" => "Burger", "quantity" => 2, "price" => 5.99],
                    ["itemName" => "Fries", "quantity" => 1, "price" => 2.99],
                    ["itemName" => "Coke", "quantity" => 3, "price" => 1.50]
                ];

                $totalAmount = 0;

                foreach ($orderDetails as $order) {
                    $itemTotal = $order["quantity"] * $order["price"];
                    $totalAmount += $itemTotal;

                    echo "<tr>";
                    echo "<td>{$order['itemName']}</td>";
                    echo "<td>{$order['quantity']}</td>";
                    echo "<td>$" . number_format($order['price'], 2) . "</td>";
                    echo "<td>$" . number_format($itemTotal, 2) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="total">
            <strong>Total Amount: $<?php echo number_format($totalAmount, 2); ?></strong>
        </div>

        <div class="review-box">
            <h2>Leave a Review</h2>
            <form action="submit_review.php" method="POST">
                <!-- <textarea name="review" placeholder="Write your review here..."></textarea> -->
                 <select class="review">
                    <option value=0>0</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                 </select>
                <button type="submit" class="btn">Submit Review</button>
            </form>
        </div>

        <a href="searchbox.php" class="btn1">Back to Home</a>
    </div>
</body>
</html>