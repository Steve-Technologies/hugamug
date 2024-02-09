<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('connect.php');
$sql = "SELECT * FROM global_variables";
$result = $conn->query($sql);
$global = array();
foreach ($result as $row) {
    $global[$row['name']] = $row['value'];
}

global $USER;
if(!isset($_SESSION)) {
    session_start();
    $_SESSION['role']="public";
    $_SESSION['request']="allow";
}
if(isset( $_SESSION['user_id']))
{
    $prosql = "SELECT * FROM user WHERE user_id = $current_user_id";
    $result = $conn->query($prosql);
    $USER = $result->fetch_assoc();
    $_SESSION['role']=$USER['role'];
}

function formatPrice($priceString) {
    // Check if the string contains a decimal point
    if (strpos($priceString, '.') !== false) {
        // Split the string into dollars and cents
        list($dollars, $cents) = explode('.', $priceString, 2);

        // Add zeros to cents if needed
        $cents = str_pad($cents, 2, '0', STR_PAD_RIGHT);

        // Combine dollars and cents with a decimal point
        $formattedPrice = $dollars . '.' . $cents;
    } else {
        // If there is no decimal point, assume there are no cents
        $formattedPrice = $priceString . '.00';
    }

    return $formattedPrice;
}

function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

function resize_and_save_image($file, $w, $h = 0, $crop = FALSE, $outputPath) {
    // Get the file extension
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    // Determine the image type based on the file extension
    switch (strtolower($extension)) {
        case 'jpg':
        case 'jpeg':
            $src = imagecreatefromjpeg($file);
            break;
        case 'png':
            $src = imagecreatefrompng($file);
            break;
        case 'webp':
            if (function_exists('imagecreatefromwebp')) {
                $src = imagecreatefromwebp($file);
            } else {
                // WebP not supported
                return false;
            }
            break;
        default:
            // Unsupported image type
            return false;
    }

    list($width, $height) = getimagesize($file);
    $r = $width / $height;

    if ($h === 0) {
        // Calculate height based on aspect ratio if $h is set to 0
        $h = round($w / $r);
    }

    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }
    }

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagealphablending($dst, false);
    imagesavealpha($dst,true);
    $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
    imagefilledrectangle($dst, 0, 0, $w, $h, $transparent);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    // Save the resized image to the specified output path
    switch (strtolower($extension)) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($dst, $outputPath);
            break;
        case 'png':
            imagepng($dst, $outputPath);
            break;
        case 'webp':
            imagewebp($dst, $outputPath);
            break;
        default:
            // Unsupported image type
            return false;
    }

    // Free up memory
    imagedestroy($src);
    imagedestroy($dst);

    return true;
}





function get_image_from_id($id,$image_type)
{
    global $conn;
 if($image_type=='thumbnail'||$image_type=='large'){
  if($image_type=='thumbnail')
   $sql='SELECT thumb_url FROM images WHERE id = ?';
  else if($image_type=='large')
  $sql='SELECT large_url FROM images WHERE id = ?';

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->bind_result($imageLocation);
  $stmt->fetch();
  $stmt->close();
  return $imageLocation;
 }
 else
 echo '<br>Invalid image_type, possible values for image_type are thumbnail and large <br>';
}

function sanitize_asset_url($url)
{
    $newurl='';
    for($i=0;$i<strlen($url);$i++)
    {
        $char=$url[$i];
        if(ctype_digit($char) || ctype_alpha($char) || $char === '-' || $char === '_'|| $char === '/' || $char === '.')
        $newurl=$newurl.$char;
        else if($char === ' ')
        $newurl=$newurl.'-';
    }
    return $newurl;
}

function authenticate($credentials)
{
    GLOBAL $conn;
    $invalidcred =true;
    $identifier = $credentials['identifier'];
    $password = $credentials['password'];
    $sql = "SELECT * FROM users WHERE username = ? OR email = ? OR billing_phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$identifier,$identifier,$identifier);
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
      }
    $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      if($user)
      {
        if(password_verify($password,$user['password']))
        {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"]= $user['id'];
            header("Location: admin_panel.php");
            exit;
            
        }
        else
        {
            $invalidcred =true;
        }
      }
      return $invalidcred;
}
?>