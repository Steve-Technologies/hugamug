<?php
require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $global['site_name'] . ' - Dashboard' ?></title>
    <link rel="stylesheet" href="dash_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Rounded" rel="stylesheet">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src='<?php echo get_image_from_id($global['site_logo'], 'thumbnail', 'absolute'); ?>' alt="<?php echo $global['site_name'] ?>">
                    <h2><?php echo $global['site_name'] ?></h2>
                </div>
                <div id="close-btn" class="close">
                    <span class="material-symbols-rounded">
                        close
                    </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-rounded">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-rounded">
                        assignment
                    </span>
                    <h3>Orders</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-rounded">
                        monitoring
                    </span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-rounded">
                        restaurant
                    </span>
                    <h3>Menu</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-rounded">
                        group
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-rounded">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>

            </div>
        </aside>
    </div>
</body>

</html>