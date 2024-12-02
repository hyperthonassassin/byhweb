<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $action = $data['action'] ?? null;
    $productId = $data['product_id'] ?? null;
    $quantity = $data['quantity'] ?? null;

    if ($productId && $action) {
        $firebaseUid = $_SESSION['user']['firebase_uid'] ?? null;

        if (!$firebaseUid) {
            echo json_encode(['success' => false, 'message' => 'User not authenticated']);
            exit;
        }

        if ($action === 'remove') {
            $sql = "DELETE FROM cart WHERE product_id = ? AND firebase_uid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $productId, $firebaseUid);
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
            } else {
                error_log("SQL Error: " . $conn->error); // Log SQL error
                echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
            }
        } elseif ($action === 'update' && $quantity !== null) {
            $sql = "UPDATE cart SET quantity = ? WHERE product_id = ? AND firebase_uid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $quantity, $productId, $firebaseUid);
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Quantity updated']);
            } else {
                error_log("SQL Error: " . $conn->error);
                echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid action or data']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product ID or action missing']);
    }
}
