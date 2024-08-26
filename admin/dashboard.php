<?php 
require_once('./components/header.php');
createHeader('container');
?>
<main>
<h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-rounded">
                        attach_money
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
                        <div class="report-type active" id="sales">
                            <span class="material-symbols-rounded">
                                attach_money
                            </span>
                            <h3>Sales</h3>
                        </div>
                        <div class="report-type" id="refunds">
                            <span class="material-symbols-rounded">
                                mintmark
                            </span>
                            <h3>Refunds</h3>
                        </div>
                        <div class="report-type" id="discounts">
                            <span class="material-symbols-rounded">
                                sell
                            </span>
                            <h3>Discounts</h3>
                        </div>
                        <div class="report-type" id="net_sales">
                            <span class="material-symbols-rounded">
                                monetization_on
                            </span>
                            <h3>Net Sales</h3>
                        </div>
                        <div class="report-type" id="profit">
                            <span class="material-symbols-rounded">
                                savings
                            </span>
                            <h3>Profit</h3>
                        </div>
                    </div>
                    <div class="core-chart-container">
                        <div class="dbtngrp">
                            <button type="button" class="primary-btn metric_swap" data-metric="amount" onclick="amt_qty_swap(this)"><span class="material-symbols-rounded">
                                    attach_money
                                </span><span>Amount</span></button>
                            <button type="button" class="primary-btn" onclick="swap_chart_type(this)"><span class="material-symbols-rounded">
                                    bar_chart
                                </span><span>Bar Chart</span></button>
                        </div>
                        <canvas id="chart"></canvas>
                    </div>
                </div>
                <!-- End of Analytics -->
                <div style="margin-top: 2rem;" class="table-container">
                    <h2>Recent Orders</h2>
                    <table id="order-table">
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
                        <a class="primary-btn" href="#">Show All</a>
                    </div>

                </div>
                <!-- End of Table -->

        </main>
        <!-- ------------- End of Main ------------- -->
        <div class="right">

        </div>
    </div>
<?php 
    require_once('./components/footer.php');
    createFooter(array("chart.js","dashboard.js"));
   ?>