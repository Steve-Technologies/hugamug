<?php
require '../functions.php';
$logo = $global['site_logo'];
$site_name = $global['site_name'];
function createHeader($container_class)
{
    global $logo;
    global $site_name;
    $optlogo = get_image_from_id($logo, 'thumbnail', 'absolute');
    $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    $title = $site_name . ' - ' . ucfirst($page);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?php echo $title ?> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        <link rel="stylesheet" href="./components/dash_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,500,1,0" />
    </head>

    <body>
        <div id="main-container" class="<?php echo $container_class?>">

            <aside>
                <div class="top">
                    <div class="logo">
                        <img src='<?php echo $optlogo ?>' alt="<?php echo $site_name ?>">
                        <h2><?php echo $site_name ?></h2>
                    </div>
                    <div id="close-btn" class="close">
                        <span class="material-symbols-rounded">
                            close
                        </span>
                    </div>
                </div>
                <div class="sidebar">
                    <a href="dashboard" class='<?php echo ($page == 'dashboard' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            dashboard
                        </span>
                        <h3>Dashboard</h3>
                    </a>
                    <a href="orders" class='<?php echo ($page == 'orders' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            assignment
                        </span>
                        <h3>Orders</h3>
                    </a>
                    <a href="#" class='<?php echo ($page == 'analytics' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            monitoring
                        </span>
                        <h3>Analytics</h3>
                    </a>
                    <a href="#" class='<?php echo ($page == 'menu' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            restaurant
                        </span>
                        <h3>Menu</h3>
                    </a>
                    <a href="items" class='<?php echo ($page == 'items' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            grocery
                        </span>
                        <h3>Items</h3>
                    </a>
                    <a href="#" class='<?php echo ($page == 'users' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            group
                        </span>
                        <h3>Users</h3>
                    </a>
                    <a href="#" class='<?php echo ($page == 'settings' ? 'active' : '') ?>'>
                        <span class="material-symbols-rounded">
                            settings
                        </span>
                        <h3>Settings</h3>
                    </a>

                </div>
            </aside>
        <?php
    }
        ?>