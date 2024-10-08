<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title><?php echo $global['site_name'] ?> - <?php echo $global['site_tagline'] ?></title>
  <meta name="title" content="<?php echo $global['site_name'] ?> - <?php echo $global['site_tagline'] ?>">
  <meta name="description" content="">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
  <!-- 
    - #PRELOADER
  -->
  <div class="preload" data-preaload>
  <lottie-player src="assets/lottie/coffee-loader.json" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay></lottie-player>
    <p class="text"><?php echo $global['site_name'] ?></p>
  </div>

   <div class="topbar">
    <div class="container">

      <address class="topbar-item link">
        <div class="icon">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
        </div>

        <a class="span" href='<?php echo $global['google_maps'] ?>' target="_blank">
        <?php echo $global['address'] ?>
        </a>
      </address>

      <div class="separator"></div>

      <div class="topbar-item item-2">
        <div class="icon">
          <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span"><?php echo $global['opening_schedule'] ?></span>
      </div>

      <a href="tel:<?php echo $global['contact_no'] ?>" class="topbar-item link">
        <div class="icon">
          <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span"><?php echo $global['contact_no'] ?></span>
      </a>

      <div class="separator"></div>

      <a href="mailto:<?php echo $global['mail'] ?>" class="topbar-item link">
        <div class="icon">
          <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span"><?php echo $global['mail'] ?></span>
      </a>
      <a href="<?php echo $global['instagram'] ?>" class="topbar-item link">
        <div class="span">
        <ion-icon name="logo-instagram" aria-hidden="true"></ion-icon>
        </div>
      </a>
      <a href="<?php echo $global['instagram'] ?>" class="topbar-item link">
        <div class="span">
        <ion-icon name="logo-facebook" aria-hidden="true"></ion-icon>
        </div>
      </a>
    </div>
  </div>





  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="<?php echo $global['domain'] ?>" class="logo">
        <img src="<?php echo get_image_from_id($global['site_logo'],'thumbnail'); ?>" width="160" height="50" alt="<?php echo $global['site_name'] ?> - Home">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="<?php echo get_image_from_id($global['site_logo'],'thumbnail'); ?>" width="160" height="50" alt="<?php echo $global['site_name'] ?> - Home">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="<?php echo $global['domain'] ?>" class="navbar-link hover-underline <?php echo (basename($_SERVER['PHP_SELF'])=="index.php")?'active':''?>">
              <div class="separator"></div>

              <span class="span">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="<?php echo $global['domain'] ?>/MainMenuFeb23_web.pdf" class="navbar-link hover-underline <?php echo (basename($_SERVER['PHP_SELF'])=="menu.php")?'active':''?>">
              <div class="separator"></div>

              <span class="span">Menus</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="<?php echo $global['domain'] ?>/#about" class="navbar-link hover-underline <?php echo (basename($_SERVER['PHP_SELF'])=="about.php")?'active':''?>">
              <div class="separator"></div>

              <span class="span">About Us</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Our Team</span>
            </a>
          </li>
          <li class="navbar-item">
            <a href="<?php echo $global['domain'] ?>/#contact" class="navbar-link hover-underline <?php echo (basename($_SERVER['PHP_SELF'])=="about.php")?'active':''?>">
              <div class="separator"></div>

              <span class="span">Contact Us</span>
            </a>
          </li>

          <!-- <li class="navbar-item">
            <a href="#" class="navbar-link hover-underline <?php echo (basename($_SERVER['PHP_SELF'])=="contact.php")?'active':''?>">
              <div class="separator"></div>

              <span class="span">Contact</span>
            </a>
          </li> -->

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Visit Us</p>

          <address class="body-4">
          <a class="linka" href="<?php echo $global['google_maps'] ?>"><?php echo $global['address'] ?></a>
          </address>

          <p class="body-4 navbar-text"><?php echo $global['opening_schedule'] ?></p>

          <a href="mailto:<?php echo $global['mail'] ?>" class="body-4 sidebar-link"><?php echo $global['mail'] ?></a>

          <div class="separator"></div>

          <p class="contact-label">Booking Request</p>

          <a href="tel:<?php echo $global['contact_no'] ?>" class="body-1 contact-number">
          <?php echo $global['contact_no'] ?>
          </a>
          <div class="mobilehsocials">
          <a href="<?php echo $global['instagram'] ?>" class="topbar-item link">
        <div class="span">
        <ion-icon name="logo-instagram" aria-hidden="true"></ion-icon>
        </div>
      </a>
      <a href="<?php echo $global['instagram'] ?>" class="topbar-item link">
        <div class="span">
        <ion-icon name="logo-facebook" aria-hidden="true"></ion-icon>
        </div>
      </a>
      </div>
        </div>

      </nav>

      <a href="https://wa.me/255759552555?text=Hello!%20I%20would%20like%20to%20make%20a%20reservation%20please." class="btn btn-secondary">
        <span class="text text-1">Find A Table</span>

        <span class="text text-2" aria-hidden="true">Find A Table</span>
      </a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>



</body>

<?php
?>