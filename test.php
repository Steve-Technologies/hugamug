<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require './functions.php';
echo password_hash('suadmhg@123',PASSWORD_DEFAULT).'<br>';
echo password_verify('suadmhg@123','$2y$10$sB0n.kMmVRd58lrep34VgOZ3h1sRdzoSklp9yQ4UMCU.5Bimesbwy')
?>