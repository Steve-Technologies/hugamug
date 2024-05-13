<?php 
require 'functions.php';
include_once('header.php');
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<body>
<!-- 
        - #MENU
      -->

      <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">

          <h2 class="headline-1 section-title text-center">Delicious Menu</h2>

          <ul class="grid-list">
            <?php  
          foreach ($result as $row) {
            $row['price']=formatPrice($row['price'])
    ?>
  
            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="width: 100px; height: 100px;">
                  <img src="<?php echo get_image_from_id($row['img_id'],'thumbnail')?>" width="100" height="100" loading="lazy" alt="<?php echo $row['name'] ?>"
                    class="img-cover" style="position: absolute;width:100px;height:100px;z-index:1;">
                </figure>

                <div style="width: 80%;">

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title"><?php echo $row['name'] ?></a>
                    </h3>

                    <span class="span title-2"><?php echo $global['currency_symbol'] ?> <?php echo $row['price'] ?></span>
                  </div>
                  <div class="qty-wrap">
                  <!-- <button class="qtybtn ">-</button>
                    <span class="title-3">0</span> -->
                    <button class="qtybtn" value=<?php echo $row['id']?> data-operation='add'  data-place='catalogue' onclick="mod_cart_cat(this)">Add to Cart</button>
                    <button class="qtybtn" value=<?php echo $row['id']?>  onclick="display_details(this)">View More</button>
                  </div>
                  <p class="card-text label-1">
                  <?php echo $row['short_desc'] ?>
                  </p>
                  <?php 
                    if($row['labels']!=''){ ?>
                    <span class="badge label-1"><?php echo $row['labels'] ?></span>
                    <?php  } ?>
                </div>

              </div>
            </li>

            <?php
          }
            ?>
          </ul>

          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-3 move-anim">

        </div>
      </section>
      <div class="modal fade" id="menu-customise-modal" tabindex="-1" role="dialog" aria-labelledby="cart-modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-between">
        <h3 class="modal-title" id="menu-customise-label">Customise Food</h3>
        <button type="button" class=" close">
        <span aria-hidden="true" style="color:white;scale:1.5;">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="menu-customise-body">
      <div class="attributes-container" id="attributes-container">

      </div>
      
        <!-- item ends -->

        <div id="subtotal-container">
          <h3>Subtotal</h3>
          <h3 id="subtotal">TZS 0.00</h3>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn">Checkout</button>
      </div>
    </div>
  </div>
</div>
      </body>
      <?php 
include_once('footer.php'); ?>