<?php
// Create connection
$conn = new mysqli('localhost','root','','hug_a_mug');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>