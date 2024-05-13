<?php 
require '../functions.php';
header('Content-Type: application/json');
$globalapi = $global;
$globalapi['site_logo'] = get_image_from_id($global['site_logo'],'thumbnail','absolute');
 echo json_encode($globalapi,JSON_PRETTY_PRINT);
?>