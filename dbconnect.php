<?php
$servername = "localhost";  // Change if using a different host
$username = "root";         // Your database username
$password = "Angelo28b";             // Your database password
$dbname = "web1";  // Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>