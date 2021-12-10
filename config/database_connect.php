<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "ENSL_STOCK_MARKET_76112023";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>