<?php 
include('connect.php');
$sql = "SELECT * FROM global_variables";
$result = $conn->query($sql);
$global = array();
foreach ($result as $row) {
    $global[$row['name']] = $row['value'];
}
?>
