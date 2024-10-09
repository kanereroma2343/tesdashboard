<?php
// config.php

// Database configuration
$servername = "localhost";    // Usually 'localhost'
$username = "root";           // Your MySQL username
$password = "";               // Your MySQL password
$dbname = "excel_data";       // Your database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // Handle connection errors gracefully
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

// Optional: Set the character set to UTF-8 for proper encoding
$conn->set_charset("utf8");

// Now, $conn can be used in your other PHP scripts by including this config file
?>
