<?php
require 'functions.php';
include_once('header.php');

?>

<!-- 
    - preload images
  -->

<head>
  <link rel="preload" as="image" href="./assets/images/hero-slider-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-3.jpg">
</head>

<body id="top">






  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero text-center" aria-label="home" id="home">

        <ul class="hero-slider" data-hero-slider>
          <?php
          $result = $conn->query("SELECT value FROM elements_data where name='home_sliders'");
          foreach ($result as $row) {
            $sliders = json_decode($row['value']);
          }

          foreach ($sliders as $slider) {
          ?>

            <li class="slider-item <?php if ($slider->id == 1) {
                                      echo 'active';
                                    } ?>" data-hero-slider-item>

              <div class="slider-bg">
                <img src="<?php echo get_image_from_id($slider->image_id, 'large') ?>" width="1880" height="950" alt="" class="img-cover">
              </div>

              <p class="label-2 section-subtitle slider-reveal"><?php echo $slider->smtitle; ?></p>

              <h1 class="display-1 hero-title slider-reveal">
                <?php echo $slider->ltitle; ?>
              </h1>

              <p class="body-2 hero-text slider-reveal">
                <?php echo $slider->subtitle; ?>
              </p>

              <a href="<?php echo $global['domain'] ?>/MainMenuFeb23_web.pdf" class="btn btn-hmprimary slider-reveal">
                <span class="text text-1">View Our Menu</span>

                <span class="text text-2" aria-hidden="true">View Our Menu</span>
              </a>

            </li>
          <?php }
          ?>


        </ul>

        <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
          <ion-icon name="chevron-back"></ion-icon>
        </button>

        <button class="slider-btn next" aria-label="slide to next" data-next-btn>
          <ion-icon name="chevron-forward"></ion-icon>
        </button>

        <a href="https://wa.me/255759552555?text=Hello!%20I%20would%20like%20to%20make%20a%20reservation%20please." class="hero-btn has-after">
          <img src="./assets/images/hero-icon.png" width="48" height="48" alt="booking icon">

          <span class="label-2 text-center span">Book A Table</span>
        </a>

      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service bg-black-10 text-center" aria-label="service">
        <div class="container">

          <p class="section-subtitle label-2">Flavour of international cuisine </p>

          <h2 class="headline-1 section-title">We Offer Top notch Culinary Experience </h2>

          <p class="section-text">
            At Hug a Mug Café & Restaurant, we believe that every meal should be an experience. Whether you're startng your day with our hearty
            Signature breakfast, enjoying our flavourful appetizers, or savouring a handcrafted cocktail, we are dedicated to serving you top-notch flavours that delight your
            taste buds.
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/service-1.jpg" width="285" height="336" loading="lazy" alt="Breakfast"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Breakfast</a>
                  </h3>
                  <h5>Our breakfast menu is designed to start your day right with wholesome and delicious options. From fluffy pancakes to freshly brewed coffee, every dish
                    is made to fuel your morning.</h5>

                  <a href="<?php echo $global['domain'] ?>/MainMenuFeb23_web.pdf" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/service-2.jpg" width="285" height="336" loading="lazy" alt="Appetizers"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Appetizers</a>
                  </h3>
                  <h5>Indulge in our selecƟon of appeƟzers that are perfect for sharing or enjoying on your own. From crispy calamari to spicy wings, our appetizers are
                    crafted to excite your palate.</h5>

                  <a href="<?php echo $global['domain'] ?>/MainMenuFeb23_web.pdf" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/service-3.jpg" width="285" height="336" loading="lazy" alt="Drinks"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Drinks</a>
                  </h3>
                  <h5>Quench your thirst with our refreshing drinks. Whether you’re in the mood for a classic cocktail, a healthful smoothie, or a freshly squeezed juice, our
                    drinks menu has something for everyone.</h5>

                  <a href="<?php echo $global['domain'] ?>/MainMenuFeb23_web.pdf" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-1.png" width="246" height="412" loading="lazy" alt="shape"
            class="shape shape-1 move-anim">
          <img src="./assets/images/shape-2.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">

          <div class="about-content">

            <p class="label-2 section-subtitle" id="about-label">Our Story</p>

            <h2 class="headline-1 section-title">Every Flavor Tells a Story</h2>

            <p class="section-text">
              Lorem Ipsum is simply dummy text of the printingand typesetting industry lorem Ipsum has been the
              industrys standard dummy text ever since the when an unknown printer took a galley of type and scrambled
              it to make a type specimen book It has survived not only five centuries, but also the leap into.
            </p>

            <div class="contact-label">Book Through Call</div>

            <a href="tel:<?php echo $global['contact_no'] ?>" class="body-1 contact-number hover-underline"><?php echo $global['contact_no'] ?></a>

            <a href="#" class="btn btn-hmprimary">
              <span class="text text-1">Read More</span>

              <span class="text text-2" aria-hidden="true">Read More</span>
            </a>

          </div>

          <figure class="about-banner">

            <img src="./assets/images/about-banner.jpg" width="570" height="570" loading="lazy" alt="about banner"
              class="w-100" data-parallax-item data-parallax-speed="1">

            <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/about-abs-image.jpg" width="285" height="285" loading="lazy" alt=""
                class="w-100">
            </div>

            <div class="abs-img abs-img-2 has-before">
              <img src="./assets/images/badge-2.png" width="133" height="134" loading="lazy" alt="">
            </div>

          </figure>

          <img src="./assets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape">

        </div>
      </section>





      <!-- 
        - #SPECIAL DISH
      -->

      <section class="special-dish text-center" aria-labelledby="dish-label">

        <div class="special-dish-banner">
          <img src="./assets/images/special-dish-banner.jpg" width="940" height="900" loading="lazy" alt="special dish"
            class="img-cover">
        </div>

        <div class="special-dish-content bg-black-10">
          <div class="container">

            <img src="./assets/images/badge-1.png" width="28" height="41" loading="lazy" alt="badge" class="abs-img">

            <p class="section-subtitle label-2">Special Dish</p>

            <h2 class="headline-1 section-title">Lobster Tortellini</h2>

            <p class="section-text">
              Lorem Ipsum is simply dummy text of the printingand typesetting industry lorem Ipsum has been the
              industrys standard dummy text ever since the when an unknown printer took a galley of type.
            </p>

            <div class="wrapper">
              <del class="del body-3">TZS 40.00</del>

              <span class="span body-1">TZS 20.00</span>
            </div>

            <a href="./menu" class="btn btn-hmprimary">
              <span class="text text-1">View All Menu</span>

              <span class="text text-2" aria-hidden="true">View All Menu</span>
            </a>

          </div>
        </div>

        <img src="./assets/images/shape-4.png" width="179" height="359" loading="lazy" alt="" class="shape shape-1">

        <img src="./assets/images/shape-9.png" width="351" height="462" loading="lazy" alt="" class="shape shape-2">

      </section>





      <!-- 
        - #MENU
      -->

      <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">

          <p class="section-subtitle text-center label-2">Special Selection</p>

          <h2 class="headline-1 section-title text-center">Monthly Specials</h2>

          <ul class="grid-list">

            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            foreach ($result as $row) {
              $row['price'] = formatPrice($row['price'])
            ?>

              <li>
                <div class="menu-card hover:card">

                  <figure class="card-banner img-holder" style="width: 100px; height: 100px;">
                    <img src="<?php echo get_image_from_id($row['img_id'], 'thumbnail') ?>" width="100" height="100" loading="lazy" alt="<?php echo $row['name'] ?>"
                      class="img-cover" style="position: absolute;width:100px;height:100px;z-index:1;">
                  </figure>

                  <div style="width: 100%;">

                    <div class="title-wrapper">
                      <h3 class="title-3">
                        <a href="#" class="card-title"><?php echo $row['name'] ?></a>
                      </h3>

                      <span class="span title-2"><?php echo $global['currency_symbol'] ?> <?php echo $row['price'] ?></span>
                    </div>
                    <div class="qty-wrap">
                      <!-- <button class="qtybtn ">-</button>
                    <span class="title-3">0</span> -->
                      <button class="qtybtn" value=<?php echo $row['id'] ?> data-operation='add' data-place='catalogue' onclick="mod_cart_cat(this)">Add to Cart</button>
                      <button class="qtybtn" value=<?php echo $row['id'] ?> onclick="display_details(this)">View More</button>
                    </div>
                    <p class="card-text label-1">
                      <?php echo $row['short_desc'] ?>
                    </p>
                    <?php
                    if ($row['labels'] != '') { ?>
                      <span class="badge label-1"><?php echo $row['labels'] ?></span>
                    <?php  } ?>
                  </div>

                </div>
              </li>

            <?php
            }
            ?>
          </ul>

          <p class="menu-text text-center">
            During winter daily from <span class="span">7:00 pm</span> to <span class="span">9:00 pm</span>
          </p>

          <a href="./menu" class="btn btn-hmprimary">
            <span class="text text-1">View All Menu</span>

            <span class="text text-2" aria-hidden="true">View All Menu</span>
          </a>

          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-3 move-anim">

        </div>
      </section>





      <!-- 
        - #TESTIMONIALS
      -->
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
        <div class="container swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="quote">”</div>

              <p class="headline-2 testi-text">
                I wanted to thank you for inviting me down for that amazing dinner the other night. The food was
                extraordinary.
              </p>

              <div class="wrapper">
                <div class="separator"></div>
                <div class="separator"></div>
                <div class="separator"></div>
              </div>

              <div class="profile">
                <img src="./assets/images/testi-avatar.jpg" width="100" height="100" loading="lazy" alt="Sam Jhonson"
                  class="img">

                <p class="label-2 profile-name">Sam Jhonson</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="quote">”</div>

              <p class="headline-2 testi-text">
                I wanted 2 to thank you for inviting me down for that amazing dinner the other night. The food was
                extraordinary.
              </p>

              <div class="wrapper">
                <div class="separator"></div>
                <div class="separator"></div>
                <div class="separator"></div>
              </div>

              <div class="profile">
                <img src="./assets/images/testi-avatar.jpg" width="100" height="100" loading="lazy" alt="Sam Jhonson"
                  class="img">

                <p class="label-2 profile-name">Sam Jhonson</p>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



      <!-- 
        - #RESERVATION
      -->

      <section class="reservation">
        <div class="container">

          <div class="form reservation-form bg-black-10">

            <form action="" class="form-left">

              <h2 class="headline-1 text-center">Online Reservation</h2>

              <p class="form-text text-center">
                To make a reservation, please fill out the form below. We look forward to hosting you!<br>For Booking request fill out the order form below.
              </p>

              <div class="input-wrapper">
                <input type="text" name="name" placeholder="Your Name" autocomplete="off" class="input-field">

                <input type="tel" name="phone" placeholder="Phone Number" autocomplete="off" class="input-field">
              </div>

              <div class="input-wrapper">

                <div class="icon-wrapper">
                  <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                  <select name="person" class="input-field">
                    <option value="1-person">1 Person</option>
                    <option value="2-person">2 Person</option>
                    <option value="3-person">3 Person</option>
                    <option value="4-person">4 Person</option>
                    <option value="5-person">5 Person</option>
                    <option value="6-person">6 Person</option>
                    <option value="7-person">7 Person</option>
                  </select>

                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

                <div class="icon-wrapper">
                  <ion-icon name="calendar-clear-outline" aria-hidden="true"></ion-icon>

                  <input type="date" name="reservation-date" class="input-field">

                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

                <div class="icon-wrapper">
                  <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                  <select name="person" class="input-field">
                    <option value="08:00am">08 : 00 am</option>
                    <option value="09:00am">09 : 00 am</option>
                    <option value="010:00am">10 : 00 am</option>
                    <option value="011:00am">11 : 00 am</option>
                    <option value="012:00am">12 : 00 am</option>
                    <option value="01:00pm">01 : 00 pm</option>
                    <option value="02:00pm">02 : 00 pm</option>
                    <option value="03:00pm">03 : 00 pm</option>
                    <option value="04:00pm">04 : 00 pm</option>
                    <option value="05:00pm">05 : 00 pm</option>
                    <option value="06:00pm">06 : 00 pm</option>
                    <option value="07:00pm">07 : 00 pm</option>
                    <option value="08:00pm">08 : 00 pm</option>
                    <option value="09:00pm">09 : 00 pm</option>
                    <option value="10:00pm">10 : 00 pm</option>
                  </select>

                  <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                </div>

              </div>

              <textarea name="message" placeholder="Message" autocomplete="off" class="input-field"></textarea>

              <button type="submit" class="btn btn-secondary">
                <span class="text text-1">Book A Table</span>

                <span class="text text-2" aria-hidden="true">Book A Table</span>
              </button>

            </form>

            <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">

              <h2 id="contact" class="headline-1 text-center">Contact Us</h2>

              <p class="contact-label">Booking Request</p>

              <a href="tel:<?php echo $global['contact_no'] ?>" class="body-1 contact-number hover-underline"><?php echo $global['contact_no'] ?></a>

              <div class="separator"></div>

              <p class="contact-label">Location</p>

              <address class="body-4">
                <a href="https://maps.app.goo.gl/y44wfsLYBoTPFT9D8" class="linka"><?php echo $global['address'] ?></a>
              </address>

              <p class="contact-label">Lunch Time</p>

              <p class="body-4">
                Thursday to Tuesday <br>
                08:00 - 23:30
              </p>

              <p class="contact-label">Dinner Time</p>

              <p class="body-4">
                Monday to Sunday <br>
                05.00 pm - 10.00pm
              </p>

            </div>
            <div class="mapdiv">
            <iframe class="gmap_iframe" style="position: absolute; height: 100%; border: none" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Hug a Mug Cafe, Tanzania&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="section features text-center" aria-label="features" style="display: none;">
        <div class="container">

          <p class="section-subtitle label-2">Why Choose Us</p>

          <h2 class="headline-1 section-title">Our Strength</h2>

          <ul class="grid-list">

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-1.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Hygienic Food</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-2.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Fresh Environment</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-3.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Skilled Chefs</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="./assets/images/features-icon-4.png" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Event & Party</h3>

                <p class="label-1 card-text">Lorem Ipsum is simply dummy printing and typesetting.</p>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-7.png" width="208" height="178" loading="lazy" alt="shape"
            class="shape shape-1">

          <img src="./assets/images/shape-8.png" width="120" height="115" loading="lazy" alt="shape"
            class="shape shape-2">

        </div>
      </section>





      <!-- 
        - #EVENT
      -->

      <section class="section event bg-black-10" aria-label="event">
        <div class="container">

          <p class="section-subtitle label-2 text-center">Recent Updates</p>

          <h2 class="section-title headline-1 text-center">Upcoming Event</h2>

          <ul class="grid-list">

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/blogs/games_night.jpg" width="350" height="450" loading="lazy"
                    alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                  <time class="publish-date label-2" datetime="2022-09-15">15/09/2022</time>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center">Games Night</p>

                  <h3 class="card-title title-2 text-center">
                  Every Saturday night in August
                  </h3>
                </div>

              </div>
            </li>

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/blogs/rotary_club_bahari_meeting.jpg" width="350" height="450" loading="lazy"
                    alt="Flavour so good you’ll try to eat with your eyes." class="img-cover overlaycs">

                  <time class="publish-date label-2" datetime="2022-09-08">08/09/2022</time>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center">Rotary Club Bahari MeeƟng</p>

                  <h3 class="card-title title-2 text-center">
                  Thursday mornings.
                  </h3>
                </div>

              </div>
            </li>

            <li>
              <div class="event-card has-before hover:shine">

                <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                  <img src="./assets/images/event-3.jpg" width="350" height="450" loading="lazy"
                    alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                  <time class="publish-date label-2" datetime="2022-09-03">03/09/2022</time>
                </div>

                <div class="card-content">
                  <p class="card-subtitle label-2 text-center">Recipie</p>

                  <h3 class="card-title title-2 text-center">
                    Flavour so good you’ll try to eat with your eyes.
                  </h3>
                </div>

              </div>
            </li>

          </ul>

          <a href="#" class="btn btn-hmprimary">
            <span class="text text-1">View Our Blog</span>

            <span class="text text-2" aria-hidden="true">View Our Blog</span>
          </a>

        </div>
      </section>

    </article>
  </main>







</body>

</html>
<?php
include_once('footer.php'); ?>