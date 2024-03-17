<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require './functions.php';
global $USER;

print_r(get_capabilities($USER));
?>