<?php
// Database connection details
$host = "localhost";   // Server name (default is localhost)
$user = "root";        // MySQL username (default is root)
$pass = "";            // Password (default is empty in XAMPP)
$dbname = "church_db"; // Database name (the one we created)

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>