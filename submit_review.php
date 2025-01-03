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


    $avgReviewQuery = "SELECT (AVG(Review) * COUNT(*) + new_review) / (COUNT(*) + 1) FROM Review WHERE R_ID = 'Your_ID'";
    $stmt = $conn->prepare($avgReviewQuery);
    $stmt->bind_param("i", $restaurantID);
    $stmt->execute();
    $reviewResult = $stmt->get_result();
    $reviewData = $reviewResult->fetch_assoc();
    $currentAvgReview = $reviewData['avg_review'];

    if ($totalOrders > 0) {
        $newAvgReview = (($currentAvgReview * $totalOrders) + $newReview) / ($totalOrders + 1);
    } else {
        $newAvgReview = $newReview;
    }
    $updateReviewQuery = "UPDATE restaurant SET Review = ? WHERE R_ID = ?";
    $stmt = $conn->prepare($updateReviewQuery);
    $stmt->bind_param("di", $newAvgReview, $restaurantID);
    $stmt->execute();

    header("Location: searchbox.php");

?>      