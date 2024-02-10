<?php
require './functions.php';
// Check if the request method is POST
if( $_SESSION['request']=="allow"){
    $_SESSION['request']="blocked";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if the 'data' parameter is set in the POST request
    if (isset($_POST["data"]) && isset($_POST["operation"]) ) {
        // Retrieve the value sent from the client
        $receivedData = $_POST["data"];
        $operation = $_POST["operation"];
        if($operation=="add") {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $receivedData); // Bind the parameter
        $stmt->execute(); // Execute the query
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if($product)
        {
            $cart = isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [];
            // Check if the received ID already exists in the cart
            if (array_key_exists($receivedData, $cart)) {
                // If the ID exists, increment the quantity by one
                $cart[$receivedData]['qty']++;
            } else {
                // If the ID is new, add it to the cart with quantity set to 1
                $cart[$receivedData] = ['qty' => 1];
            }
    
            // Encode the cart array to JSON and store it in the session variable
            $_SESSION['cart'] = json_encode($cart);
            update_user_cart($_SESSION['cart']);
            // Send a success response
            echo json_encode("Success");

        }
        else
        {
        echo json_encode("Received data: " . $receivedData. " does not exists");
        }
    }
    else if($operation=="remove"){
        $cart = isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [];
            // Check if the received ID already exists in the cart
            if (array_key_exists($receivedData, $cart)) {
                $cart[$receivedData]['qty']--;
                if ($cart[$receivedData]['qty'] == 0) {
                    unset($cart[$receivedData]);
                }
            }
    
            // Encode the cart array to JSON and store it in the session variable
            $_SESSION['cart'] = json_encode($cart);
            update_user_cart($_SESSION['cart']);
    
            // Send a success response
            echo json_encode("Success");
        }

    }
        
        // Process the received data (in this example, simply echoing it back)
     else {
        // 'data' parameter is not set in the request
        http_response_code(400); // Bad Request
        echo "Error: 'data' parameter is missing in the request.";
    }
}

 else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Error: Only POST requests are allowed.";
}

$_SESSION['request']="allow";
}

function update_user_cart($cart){
    global $USER; global $conn;
    if($USER){
    $sql="UPDATE users SET cart=? WHERE id=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("si",$cart,$USER['id']);
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    }
}
?>
