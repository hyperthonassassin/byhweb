<?php
// config.php

// Database credentials
define('DB_SERVER', 'localhost');     // Database host
define('DB_USERNAME', 'root');         // Database username
define('DB_PASSWORD', '');             // Database password
define('DB_NAME', 'byh');              // Database name

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>