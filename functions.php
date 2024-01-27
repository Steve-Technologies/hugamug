<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('connect.php');
$sql = "SELECT * FROM global_variables";
$result = $conn->query($sql);
$global = array();
foreach ($result as $row) {
    $global[$row['name']] = $row['value'];
}
function formatPrice($priceString) {
    // Check if the string contains a decimal point
    if (strpos($priceString, '.') !== false) {
        // Split the string into dollars and cents
        list($dollars, $cents) = explode('.', $priceString, 2);

        // Add zeros to cents if needed
        $cents = str_pad($cents, 2, '0', STR_PAD_RIGHT);

        // Combine dollars and cents with a decimal point
        $formattedPrice = $dollars . '.' . $cents;
    } else {
        // If there is no decimal point, assume there are no cents
        $formattedPrice = $priceString . '.00';
    }

    return $formattedPrice;
}
?>