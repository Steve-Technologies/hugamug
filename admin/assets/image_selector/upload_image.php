<?php
require '../../../functions.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

// upload_image.php
// Handle image upload and insert into the database
$allowedTypes = ['image/png', 'image/jpeg', 'image/webp',  'image/svg+xml'];
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    if($_FILES['image']['size']<3145728 && in_array($_FILES['image']['type'],$allowedTypes))
    $tmp_name = $_FILES['image']['tmp_name'];
    $cmpname= 'compressed_'.$_FILES['image']['name'];
    $name=$_FILES['image']['name'];
    $uniqid=uniqid();
    $url = '../../../uploads/images/' . $uniqid . '_' . $name;
    $urlcp = '../../../uploads/images/' . $uniqid . '_' . $cmpname;
    $url=sanitize_asset_url($url);
    $urlcp=sanitize_asset_url($urlcp);
    move_uploaded_file($tmp_name, $url);
    if($_FILES['image']['type']!='image/svg+xml'){
    resize_and_save_image($url, 300, 0, true, $urlcp);}
    $dbimgurl='uploads/images/' . $uniqid . '_' . $name;
    $dbimgurl=sanitize_asset_url($dbimgurl);
    $dbimgcpurl='uploads/images/' . $uniqid . '_' . $cmpname;
    $dbimgcpurl=sanitize_asset_url($dbimgcpurl);
    if($_FILES['image']['type']=='image/svg+xml'){
        $dbimgcpurl=$dbimgurl;}

    $stmt = $conn->prepare('INSERT INTO images (name,thumb_url,large_url) VALUES (?,?,?)');
    $stmt->execute([$name,$dbimgcpurl,$dbimgurl]);

    $response = ['status' => 'success', 'size'=>$_FILES['image']['size'],'url' => $url];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Upload failed']);
}
?>
