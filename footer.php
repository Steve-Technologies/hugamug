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
  
    <!-- 
    - #Whatsapp
  -->
  
  <a href="https://wa.me/255759552555?text=Hi%20there%2C%20I%20have%20a%20query%20on%20Hug%20A%20Mug%20Cafe" class="back-top-btn active" aria-label="Whatsapp" data-back-top-btn>
    <ion-icon name="logo-whatsapp" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
  </footer>

</html>