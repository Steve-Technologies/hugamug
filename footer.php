<?php 
 ?>
<!-- 
    - #FOOTER
  -->

  <footer class="footer section has-bg-image text-center"
    style="background-image: url('./assets/images/footer-bg.jpg')">
    <div class="container">

      <div class="footer-top grid-list">

        <div class="footer-brand has-before has-after">

          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" width="160" height="50" loading="lazy" alt="<?php echo $global['site_name'] ?> home">
          </a>

          <address class="body-4">
          <?php echo $global['address'] ?>
          </address>

          <a href="mailto:<?php echo $global['mail'] ?>" class="body-4 contact-link"><?php echo $global['mail'] ?></a>

          <a href="tel:<?php echo $global['contact_no'] ?>" class="body-4 contact-link">Booking Request : <?php echo $global['contact_no'] ?></a>

          <p class="body-4">
          <?php echo $global['opening_schedule'] ?>
          </p>

          <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
          </div>

          <p class="title-1">Get News & Offers</p>

          <p class="label-1">
            Subscribe us & Get <span class="span">25% Off.</span>
          </p>

          <form action="" class="input-wrapper">
            <div class="icon-wrapper">
              <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>

              <input type="email" name="email_address" placeholder="Your email" autocomplete="off" class="input-field">
            </div>

            <button type="submit" class="btn btn-secondary">
              <span class="text text-1">Subscribe</span>

              <span class="text text-2" aria-hidden="true">Subscribe</span>
            </button>
          </form>

        </div>

        <ul class="footer-list">

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Home</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Menus</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">About Us</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Our Chefs</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Contact</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Facebook</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Instagram</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Twitter</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Youtube</a>
          </li>

          <li>
            <a href="#" class="label-2 footer-link hover-underline">Google Map</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">

        <p class="copyright">
          &copy; 2022 <?php echo $global['site_name'] ?>. All Rights Reserved
        </p>

      </div>

    </div>






  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn style="
    bottom: 90px;">
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>

  <!-- cart button -->
  
  <a class="cart-btn active" id='crtbtn' aria-label="cart" data-back-top-btn >
    <svg id="bficons" class="button-icons" version="1.1" xmlns="http://www.w3.org/2000/svg" style="overflow: visible" viewBox="-15 0 100 50">
    <path id="closed" class="icon" d="M40.1518 4C39.9747 3.31397 39.6168 2.68111 39.1073 2.17157C38.3571 1.42143 37.3397 1 36.2789 1C35.218 1 34.2006 1.42143 33.4504 2.17157C32.9409 2.68111 32.583 3.31397 32.4059 4L34.8922 4C35.0946 3.99597 35.2972 3.99395 35.5 3.99395C35.7028 3.99395 35.9054 3.99597 36.1078 4H36.2789H40.1518ZM31.3799 4C31.3609 4.09274 31.3446 4.18615 31.3309 4.28011C24.7818 5.18369 18.6613 8.19913 13.9332 12.9272C8.44951 18.4109 5.26958 25.7678 5.01638 33.4939C5.00548 33.8266 5 34.16 5 34.4939H6L35.5 34.4939H65H66C66 34.16 65.9945 33.8266 65.9836 33.4939C65.7304 25.7678 62.5505 18.4109 57.0668 12.9272C52.7232 8.58365 47.2045 5.68548 41.2579 4.54225C41.2411 4.35956 41.2143 4.17856 41.1779 4C40.9832 3.04656 40.5128 2.16285 39.8144 1.46447C38.8767 0.526784 37.6049 0 36.2789 0C34.9528 0 33.681 0.526784 32.7433 1.46447C32.0449 2.16285 31.5745 3.04656 31.3799 4ZM14.6404 13.6343C20.0316 8.24302 27.2948 5.154 34.9023 5L36.0977 5C43.7052 5.154 50.9684 8.24302 56.3596 13.6343C61.6558 18.9305 64.7303 26.0331 64.9831 33.4939H35.5L6.01693 33.4939C6.26975 26.0331 9.34417 18.9305 14.6404 13.6343ZM9 41H8H1H0V40V38V37H1H69H70V38V40V41H69H62H61V42V43H60H10H9V42V41ZM9 40H1V38H69V40H61H60V41V42H10V41V40H9Z"></path>
    <path id="open" class="icon" d="M53.8093 51.8098C59.1252 46.5687 62.2659 39.4951 62.5726 32.0115 62.8848 24.3934 60.2355 16.9586 55.1942 11.2592L54.3842 10.38C49.1165 4.8893 41.9234 1.6404 34.3053 1.3282 26.8217 1.0215 19.5148 3.5728 13.8563 8.442L33.8328 30.1259 53.8093 51.8098ZM63.5717 32.0524C63.8233 25.9149 62.2155 19.8923 59.0272 14.7442 59.1502 14.6081 59.2651 14.4657 59.3718 14.3179 59.9411 13.5288 60.2723 12.584 60.3128 11.5972 60.3671 10.2722 59.8928 8.9799 58.9943 8.0046 58.0958 7.0293 56.8467 6.4509 55.5217 6.3966 54.5349 6.3562 53.5662 6.6089 52.7331 7.1118 52.652 7.1607 52.5723 7.212 52.4939 7.2656 47.392 3.0612 41.0272.6029 34.3463.3291 26.5976.0115 19.0323 2.6574 13.1784 7.7061 12.9263 7.9235 12.6774 8.1454 12.4318 8.3717L13.1094 9.1071 33.0973 30.8035 53.0853 52.4998 53.7629 53.2353C54.0085 53.009 54.2499 52.7791 54.4872 52.5457 59.998 47.1245 63.2542 39.8011 63.5717 32.0524ZM56.0524 10.7149 55.9365 10.589C55.8023 10.4375 55.6666 10.2871 55.5291 10.138 55.3917 9.9888 55.253 9.8412 55.1129 9.6951L53.4282 7.8664C54.0528 7.5319 54.7607 7.3663 55.4807 7.3958 56.5407 7.4392 57.54 7.902 58.2588 8.6822 58.9776 9.4624 59.357 10.4963 59.3136 11.5562 59.2841 12.2762 59.0611 12.9682 58.6766 13.5633L56.0524 10.7149ZM9 59H8 1 0V58 56 55H1 69 70V56 58 59H69 62 61V60 61H60 10 9V60 59ZM9 58H1V56H69V58H61 60V59 60H10V59 58H9Z" style="visibility:hidden;" stroke="#000" stroke-width="1.4" fill="none"></path>
  </svg>
  </a>
<!-- cart popup -->
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="cart-modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-between">
        <h3 class="modal-title" id="cartLabel">Cart</h3>
        <button type="button" class=" close" onclick="close_cart()">
        <span aria-hidden="true" style="color:white;scale:1.5;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <div class="menu-card cart-item">
        <figure class="card-banner img-holder" style="width: 100px; height: 100px;">
         <img src="uploads/images/65bffd8c0eb99_compressed_chicken_biriyani.jpeg" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover" style="position: absolute;width:100px;height:100px;z-index:1;">
        </figure>

<div>
  <div class="title-wrapper">
    <h3 class="title-3">
      <a href="#" class="card-title">Greek Salad</a>
    </h3>
     <span class="badge label-1">Seasonal</span>
     <span class="span title-2">TZS 25.50</span>
  </div>
  <div class="qty-wrap">
    <button class="qtybtn ">-</button>
      <span class="title-3">0</span>
    <button class="qtybtn " value="1" onclick="addtocart(this)">+</button>
  </div>

  <p class="card-text label-1">
  Tomatoes, green bell pepper, sliced cucumber onion, olives, and feta cheese.                  </p>

</div>

</div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn">Checkout</button>
      </div>
    </div>
  </div>
</div>




    <!-- 
    - #Whatsapp
  -->
  
  <a href="https://wa.me/255759552555?text=Hi%20there%2C%20I%20have%20a%20query%20on%20Hug%20A%20Mug%20Cafe" class="back-top-btn active" aria-label="Whatsapp" data-back-top-btn>
    <ion-icon name="logo-whatsapp" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='tweenmax.js'></script>
<script src='morphsvg.js'></script><script  src="script.js"></script>
  <script src="script.js"></script>

  <!-- 
    - ionicon link
  -->
  
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
  </footer>

</html>