<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require './functions.php';
$result=$conn->query("SELECT value FROM elements_data where name='home_sliders'");
foreach ($result as $row) {
   $sliders=json_decode($row['value']);}
   foreach($sliders as $slider){
    echo $slider->id.'<br>'.$slider->image_id.'<br>'.$slider->smtitle;
   echo '<br><br>';}
?>