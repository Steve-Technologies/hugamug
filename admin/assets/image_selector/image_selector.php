<?php 
function get_image_selector($rel_css,$rel_js)
{
$image_selector = <<<image_selector
<link rel="stylesheet" href="$rel_css">
<input type="hidden" name="img_id" id=img_id>
<div id="imageSelector">
    <h2> Drag the images on the box to upload </h2>
    <div id="imageContainer">
        <!-- Image options will be displayed here dynamically -->
    </div>
</div>

<script src="$rel_js"></script>

image_selector;
return $image_selector;
}

?>