<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$currentPath = __DIR__;

// Define the directory you want to reach
$targetDirectory = 'hugamug';

// Initialize a variable to store the final path
$finalPath = '';

// Loop until we reach the target directory
while (basename($currentPath) !== $targetDirectory && $currentPath !== '/') {
    $finalPath = $currentPath;
    $currentPath = dirname($currentPath);
}

// If the loop exited and we didn't find the target directory, set the final path to the document root
if ($finalPath === '') {
    // $finalPath = $_SERVER['DOCUMENT_ROOT'];
}

// Output the final path
echo $finalPath;
?>