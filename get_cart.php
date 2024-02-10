<?php
require './functions.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
$domain=$global['domain'];
$cart_items=json_decode($_SESSION['cart']);
$sub_total=0;
foreach($cart_items as $item_id=>$item){
    $sql='SELECT id,name,img_id,short_desc,price,labels FROM products WHERE id = ?';
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i", $item_id); // Bind the parameter
    $stmt->execute();
    $stmt->bind_result($id,$name,$img_id,$short_desc,$price,$labels);
    $stmt->fetch();
    $stmt->close();
    $img_url=get_image_from_id($img_id,'thumbnail');

    $sub_total +=$item->qty*$price;
    $full_cart_items[]=array("id" => $id, "name" => $name, "img_url" => $img_url, "short_desc" => $short_desc, "price" => $price, "qty" => $item->qty, 'label'=>$labels ,'individual_total' => $global['currency_symbol'].' '.formatPrice($item->qty*$price));

}
$sub_total_fin = $global['currency_symbol'].' '.formatPrice($sub_total);
$cart=array("items"=>$full_cart_items, "sub_total"=>$sub_total_fin);

echo json_encode($cart);

?>