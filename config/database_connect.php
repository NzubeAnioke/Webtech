<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database= "ensl_stock_market_76112023";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
