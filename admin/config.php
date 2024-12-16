<?php
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password (leave empty if no password is set)
$database = "kukis_db"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
