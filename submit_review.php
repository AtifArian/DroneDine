<?php 
    include "Datbase.php";
    session_start();
    $rating = $_POST['review'];
    //$restaurantID = $_['R_ID']; 

    $orderCountQuery = "SELECT COUNT(O_ID) AS total_orders FROM `order` WHERE R_ID = ?";
    $stmt = $conn->prepare($orderCountQuery);
    $stmt->bind_param("i", $restaurantID);
    $stmt->execute();
    $orderResult = $stmt->get_result();
    $orderData = $orderResult->fetch_assoc();
    $totalOrders = $orderData['total_orders'];

    // Step 2: Retrieve the current average review from the `restaurant` table
    $avgReviewQuery = "SELECT AVG(review_value) AS avg_review FROM reviews WHERE R_ID = ?";
    $stmt = $conn->prepare($avgReviewQuery);
    $stmt->bind_param("i", $restaurantID);
    $stmt->execute();
    $reviewResult = $stmt->get_result();
    $reviewData = $reviewResult->fetch_assoc();
    $currentAvgReview = $reviewData['avg_review'];

    // Step 3: Calculate the new average review value
    if ($totalOrders > 0) {
        $newAvgReview = (($currentAvgReview * $totalOrders) + $newReview) / ($totalOrders + 1);
    } else {
        $newAvgReview = $newReview; // If no previous orders, the new review is the average
    }

    // Step 4: Update the review value in the `restaurant` table
    $updateReviewQuery = "UPDATE restaurant SET review_value = ? WHERE R_ID = ?";
    $stmt = $conn->prepare($updateReviewQuery);
    $stmt->bind_param("di", $newAvgReview, $restaurantID);
    $stmt->execute();

    echo "New average review for restaurant updated successfully!";
?>