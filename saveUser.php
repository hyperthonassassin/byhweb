<?php
// Start the session
session_start();

// Include the config file to establish the database connection
require 'config.php'; // or include 'config.php';

// Get the POST data (assuming JSON is sent)
$data = json_decode(file_get_contents("php://input"), true);

// Check if data is received correctly
if (isset($data['firebase_uid'], $data['email'], $data['name'], $data['photo_url'])) {
    $firebase_uid = $data['firebase_uid'];
    $email = $data['email'];
    $name = $data['name'];
    $photo_url = $data['photo_url'];

    // Check if user already exists
    $sql = "SELECT * FROM users WHERE firebase_uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $firebase_uid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the user already exists, update their information
        $update_sql = "UPDATE users SET email = ?, name = ?, photo_url = ? WHERE firebase_uid = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssss", $email, $name, $photo_url, $firebase_uid);
        $update_stmt->execute();

        // Store user data in the session
        $_SESSION['user'] = [
            'firebase_uid' => $firebase_uid,
            'name' => $name,
            'email' => $email,
            'photo' => $photo_url
        ];

        echo json_encode(["success" => true, "message" => "User updated successfully"]);
    } else {
        // If the user does not exist, insert a new record
        $insert_sql = "INSERT INTO users (firebase_uid, email, name, photo_url) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ssss", $firebase_uid, $email, $name, $photo_url);
        $insert_stmt->execute();

        // Store user data in the session
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
            'photo' => $photo_url
        ];

        echo json_encode(["success" => true, "message" => "User saved successfully"]);
    }
} else {
    // If data is missing, return an error
    echo json_encode(["success" => false, "message" => "Missing required fields"]);
}

// Close the database connection
$conn->close();
?>
