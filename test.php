<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require './functions.php';
global $USER;

$img = get_image_from_id($global['site_logo'],'thumbnail');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?php echo $img?>">
</body>
</html>