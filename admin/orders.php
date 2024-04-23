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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,500,1,0" />
</head>

<body>
    <div class="container-2">
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
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="active">
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
                        grocery
                    </span>
                    <h3>Items</h3>
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
        <!-- ---- End of Aside (Sidebar) ---- -->
        <main>
            <h1>Orders</h1>
                <div style="margin-top: 2rem;" class="table-container">
                    <h2>Recent Orders</h2>
                    <table id="order-table-main">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Table No:</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th tooltip="Waiter/Online">Source</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <!-- to be filled by fetch_order_table() -->
                        </tbody>
                    </table>
                    <dialog id="order_view" class="popups">
                        <div class="popup-container">
                            <div class="popup-header">
                                <h2>1001</h2>
                                <button class="primary-btn" onclick="close_popup(this)">
                                <div class="close"><span class="material-symbols-rounded">
                                        close
                                    </span>
                                </div>
                                </button>
                            </div>
                            <div class="customer-info">
                            <h2 id="order-customer-name">Binoy R.S</h2>
                            <div class="customer-other-info">
                                <div class="left">
                                    <div id="order-bill-info" class="card">
                                        <h3><b>Billing Information:<b></h3>
                                        <h4><a id="customer-bill-phone" href="tel:+255 759 552 555 ">+255 759 552 555</a></h4>
                                        <h5 id="order-bill-address">102, Haile Selassie Road, Masaki, Dar es Salaam - Tanzania</h5>
                                    </div>
                                </div>
                                <div class="right">
                                <div id="order-ship-info" class="card">
                                        <h3><b>Shipping Information:<b></h3>
                                        <h4><a id="customer-ship-phone" href="tel:+255 759 552 555 ">+255 759 552 555</a></h4>
                                        <h5 id="order-ship-address">102, Haile Selassie Road, Masaki, Dar es Salaam - Tanzania</h5>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="order-info">
                            <div style="margin-top: 2rem;" class="table-container">
                    <table id="order-menu-table">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Menu Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td>1231</td>
                                <td>Burger</td>
                                <td>2</td>
                                <td>60</td>
                            </tr>
                            <!-- to be filled by fetch_order_table() -->
                        </tbody>
                    </table>
                            </div>
                        </div>
                    </dialog>

                    <div class="tbl-ext-btn-container">
                        <!-- <a class="primary-btn" href="#">Show All</a> -->
                    </div>

                </div>
                <!-- End of Table -->

        </main>
        <!-- ------------- End of Main ------------- -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dash_script.js"></script>
</body>

</html>