<?php
require '../../../functions.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
// get_images.php
// Fetch image options from the database
$domain=$global['domain'];
$result = $conn->query("SELECT id, CONCAT('$domain','/',thumb_url) AS thumb_url FROM images ORDER BY uploaded_time DESC");
$images=$result->fetch_all(MYSQLI_ASSOC);
header('Content-Type: application/json');
echo json_encode($images);
?>
