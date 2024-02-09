<?php 
include_once './connect.php';
$current_file_name = basename($_SERVER['PHP_SELF']);
$sql = 'SELECT * FROM pages WHERE file_name = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$current_file_name);
if (!$stmt->execute()) {
    die("Error: " . $stmt->error);
  }

?>