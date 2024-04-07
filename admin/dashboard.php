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
                <a href="#" class="active">
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
        <!-- ---- End of Aside (Sidebar) ---- -->
        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-rounded">
                        mintmark
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>TZS 150,000</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- ----- End of Sales ----- -->
                <div class="orders">
                    <span class="material-symbols-rounded">
                        assignment
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Orders</h3>
                            <h1>50</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>91%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- ----- End of Orders ----- -->
                <div class="profit">
                    <span class="material-symbols-rounded">
                        savings
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Profit</h3>
                            <h1>TZS 55,000</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>89%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- ----- End of Profit ----- -->
            </div>
            <!-- ----- End of Insights ----- -->
            <div style="margin-top: 2rem;" class="chart-container">
                <h2>Analytics</h2>
                <div class="reports-container">
                   <div class="report-types-container">
                    <div class="report-type">
                        <span class="material-symbols-rounded">
                            shopping_cart
                        </span>
                        <h3>Sales</h3>
                    </div>
                    <div class="report-type">
                        <span class="material-symbols-rounded">
                            shopping_cart
                        </span>
                        <h3>Orders</h3>
                    </div>
                    <div class="report-type">
                        <span class="material-symbols-rounded">
                            shopping_cart
                        </span>
                        <h3>Profit</h3>
                    </div>
                   </div>
                <div class="core-chart-container">
                <div class="dbtngrp">
                    <button type="button" class="primary-btn" onclick="swap(this)">Amount</button>
                </div>
              <canvas id="chart"></canvas>
              </div>
            </div>
            <!-- End of Analytics -->
            <div style="margin-top: 2rem;" class="table-container">
                <h2>Recent Orders</h2>
                <table>
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
                        <tr>
                            <td>1000</td>
                            <td>Binoy</td>
                            <td>2</td>
                            <td class="status-rejected"><span>Rejected</span></td>
                            <td>TZS 2000</td>
                            <td>Dine in</td>
                            <td><a href="#">Nobel</a></td>
                            <td class="btn-col">
                                <button tooltip="View" class="primary-btn tooltip"><span class="material-symbols-rounded">
                                        visibility
                                    </span></button>
                                <a href="#" tooltip="Edit" class="primary-btn"><span class="material-symbols-rounded">
                                        edit
                                    </span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1000</td>
                            <td>Binoy</td>
                            <td>2</td>
                            <td class="status-cancelled"><span>Cancelled</span></td>
                            <td>TZS 2000</td>
                            <td>Dine in</td>
                            <td>Online</td>
                            <td class="btn-col">
                                <button tooltip="View" class="primary-btn tooltip"><span class="material-symbols-rounded">
                                        visibility
                                    </span></button>
                                <a href="#" tooltip="Edit" class="primary-btn"><span class="material-symbols-rounded">
                                        edit
                                    </span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1000</td>
                            <td>Binoy</td>
                            <td>2</td>
                            <td class="status-processing"><span>Preparing</span></td>
                            <td>TZS 2000</td>
                            <td>Dine in</td>
                            <td><a href="#">Philip</a></td>
                            <td class="btn-col">
                                <button tooltip="View" class="primary-btn tooltip"><span class="material-symbols-rounded">
                                        visibility
                                    </span></button>
                                <a href="#" tooltip="Edit" class="primary-btn"><span class="material-symbols-rounded">
                                        edit
                                    </span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1000</td>
                            <td>Binoy</td>
                            <td>2</td>
                            <td class="status-completed"><span>Completed</span></td>
                            <td>TZS 2000</td>
                            <td>Dine in</td>
                            <td><a href="#">Micheal</a></td>
                            <td class="btn-col">
                                <button tooltip="View" class="primary-btn tooltip"><span class="material-symbols-rounded">
                                        visibility
                                    </span></button>
                                <a href="#" tooltip="Edit" class="primary-btn"><span class="material-symbols-rounded">
                                        edit
                                    </span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="tbl-ext-btn-container">
                <a class="primary-btn" href="#">Show All</a>
                </div>
                
            </div>
            <!-- End of Table -->

        </main>
        <!-- ------------- End of Main ------------- -->
        <div class="right">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dash_script.js"></script>
</body>

</html>