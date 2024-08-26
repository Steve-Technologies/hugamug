<?php
require_once('./components/header.php');
createHeader('container-2');
?>
<main>
    <h1>Items</h1>
    <div class="top-btns-group">
        <button class="primary-btn round-btn" tooltip="Add Item" id="add_item_btn">
            <span class="material-symbols-rounded">
                add
            </span>
        </button>
        <div class="search-form">
            <input type="text" class="search-input" placeholder="Search Items...">
            <span class="material-symbols-rounded">
                search
            </span>
        </div>
    </div>
    <div style="margin-top: 1rem;" class="table-container">
        <table id="item-table">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Cost</th>
                    <th>Selling Price</th>
                    <th>Profit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- to be filled by js -->
            </tbody>
        </table>
        <dialog id="item_view" class="popups">
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
                    <h2 id="item-customer-name">Binoy R.S</h2>
                    <div class="customer-other-info">
                        <div class="left">
                            <div id="item-bill-info" class="card">
                                <h3><b>Billing Information:<b></h3>
                                <h4><a id="customer-bill-phone" href="tel:+255 759 552 555 ">+255 759 552 555</a></h4>
                                <h5 id="item-bill-address">102, Haile Selassie Road, Masaki, Dar es Salaam - Tanzania</h5>
                            </div>
                        </div>
                        <div class="right">
                            <div id="item-ship-info" class="card">
                                <h3><b>Shipping Information:<b></h3>
                                <h4><a id="customer-ship-phone" href="tel:+255 759 552 555 ">+255 759 552 555</a></h4>
                                <h5 id="item-ship-address">102, Haile Selassie Road, Masaki, Dar es Salaam - Tanzania</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-info">
                    <div style="margin-top: 2rem;" class="table-container">
                        <table id="item-menu-table">
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
                                <!-- to be filled by fetch_item_table() -->
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
    <dialog id="add_item_popup" class="popups form-popup">
        <div class="popup-container">
            <div class="popup-header">
                <h2>Add Item</h2>
                <button class="primary-btn" onclick="close_popup(this)">
                    <div class="close"><span class="material-symbols-rounded">
                            close
                        </span>
                    </div>
                </button>
            </div>
            <div class="item-info">
                <form action="" method="post" name="item_create">
                    <div class="input_row">
                        <div class="inputs-container">
                            <div class="input_group">
                                <input type="text" name="item_name" class="animated_inputs">
                                <label htmlFor="item_name">Item Name</label>
                            </div>
                            <div class="input_group">
                                <select id="category-select" name="category" placeholder="Pick a Category...">
                                    <option value="">Select a category...</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </dialog>

</main>
<?php
require_once('./components/footer.php');
createFooter(array("items.js"));
?>