<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID and user_uid from the request
    $data = json_decode(file_get_contents("php://input"), true);
    $productId = $data['product_id'] ?? null;
    $userUid = $data['user_uid'] ?? null;

    // Ensure user_uid is set
    if (!$userUid) {
        echo json_encode(['success' => false, 'message' => 'User not logged in.']);
        exit;
    }

    // Get the user_id from the database based on firebase_uid
    $sql = "SELECT id FROM users WHERE firebase_uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userUid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userId = $user['id'];
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
        exit;
    }

    if ($productId && $userId) {
        // Check if the product exists in the cart for the user
        $checkCartSql = "SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?";
        $checkCartStmt = $conn->prepare($checkCartSql);
        $checkCartStmt->bind_param("ii", $userId, $productId);
        $checkCartStmt->execute();
        $cartResult = $checkCartStmt->get_result();

        // If product exists, increment the quantity; otherwise, set it to 1
        if ($cartResult->num_rows > 0) {
            $updateCartSql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
            $updateCartStmt = $conn->prepare($updateCartSql);
            $updateCartStmt->bind_param("ii", $userId, $productId);
            $updateCartStmt->execute();
        } else {
            $quantity = 1; // Set quantity to 1 for new entries
            $insertCartSql = "INSERT INTO cart (user_id, product_id, quantity, firebase_uid) VALUES (?, ?, ?, ?)";
            $insertCartStmt = $conn->prepare($insertCartSql);
            $insertCartStmt->bind_param("iiis", $userId, $productId, $quantity, $userUid);
            $insertCartStmt->execute();
        }

        echo json_encode(['success' => true, 'message' => 'Product added to cart']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid product or user ID']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
