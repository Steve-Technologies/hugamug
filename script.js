/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

const preloader = document.querySelector("[data-preaload]");

window.addEventListener("load", function () {
  preloader.classList.add("loaded");
  document.body.classList.add("loaded");
});


/**
 * add event listener on multiple elements
 */
const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    if(elements[i]){
    elements[i].addEventListener(eventType, callback);}
  }
}



/**
 * NAVBAR
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
}

addEventOnElements(navTogglers, "click", toggleNavbar);



/**
 * HEADER & BACK TOP BTN
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

let lastScrollPos = 0;

const hideHeader = function () {
  const isScrollBottom = lastScrollPos < window.scrollY;
  if (isScrollBottom) {
    header.classList.add("hide");
  } else {
    header.classList.remove("hide");
  }

  lastScrollPos = window.scrollY;
}

window.addEventListener("scroll", function () {
  if (window.scrollY >= 50) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
    hideHeader();
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});

const goldcrayola = '#e4c590';

/**
 * HERO SLIDER
 */

const heroSlider = document.querySelector("[data-hero-slider]");
const heroSliderItems = document.querySelectorAll("[data-hero-slider-item]");
const heroSliderPrevBtn = document.querySelector("[data-prev-btn]");
const heroSliderNextBtn = document.querySelector("[data-next-btn]");

let currentSlidePos = 0;
let lastActiveSliderItem = heroSliderItems[0];

const updateSliderPos = function () {
  if(lastActiveSliderItem){
  lastActiveSliderItem.classList.remove("active");}
  if(heroSliderItems[currentSlidePos]){
  heroSliderItems[currentSlidePos].classList.add("active");}
  if(heroSliderItems[currentSlidePos]){
  lastActiveSliderItem = heroSliderItems[currentSlidePos];}
}

const slideNext = function () {
  if (currentSlidePos >= heroSliderItems.length - 1) {
    currentSlidePos = 0;
  } else {
    currentSlidePos++;
  }

  updateSliderPos();
}
if(heroSliderNextBtn){
heroSliderNextBtn.addEventListener("click", slideNext);}

const slidePrev = function () {
  if (currentSlidePos <= 0) {
    currentSlidePos = heroSliderItems.length - 1;
  } else {
    currentSlidePos--;
  }

  updateSliderPos();
}
if(heroSliderPrevBtn){
heroSliderPrevBtn.addEventListener("click", slidePrev);}

/**
 * auto slide
 */

let autoSlideInterval;

const autoSlide = function () {
  autoSlideInterval = setInterval(function () {
    slideNext();
  }, 7000);
}

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], "mouseover", function () {
  clearInterval(autoSlideInterval);
});

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], "mouseout", autoSlide);

window.addEventListener("load", autoSlide);



/**
 * PARALLAX EFFECT
 */

const parallaxItems = document.querySelectorAll("[data-parallax-item]");

let x, y;

window.addEventListener("mousemove", function (event) {

  x = (event.clientX / window.innerWidth * 10) - 5;
  y = (event.clientY / window.innerHeight * 10) - 5;

  // reverse the number eg. 20 -> -20, -5 -> 5
  x = x - (x * 2);
  y = y - (y * 2);

  for (let i = 0, len = parallaxItems.length; i < len; i++) {
    x = x * Number(parallaxItems[i].dataset.parallaxSpeed);
    y = y * Number(parallaxItems[i].dataset.parallaxSpeed);
    parallaxItems[i].style.transform = `translate3d(${x}px, ${y}px, 0px)`;
  }

});

var select = function(s) {
  return document.querySelector(s);
},
  icons = select('#icons'),crtbtn = select('#crtbtn')

  var buttonTl = new TimelineMax({paused:true});
  buttonTl.to('#closed', 1, {
    morphSVG:{shape:'#open'},
    ease:Elastic.easeInOut
  })


function animcart() {
  if (buttonTl.time() > 0) {
    buttonTl.reverse();
    crtbtn.style.scale=1.4
    crtbtn.style.backgroundColor=goldcrayola;
  } else {
    crtbtn.style.scale=2
    crtbtn.style.backgroundColor = 'white';
    buttonTl.play(0);
  }
}

function isCartOpen(){
if (buttonTl.time() > 0) {
  return true
} else {
  return false
}}

crtbtn.addEventListener('click', open_cart);
function open_cart()
{
  $('#cart-modal').modal('show');
}
$('#cart-modal').on('show.bs.modal', get_cart);

function get_cart(){
  cart_body=document.querySelector('#cart-body');
  toggleLoading(cart_body);
  // Use AJAX to get image options from the server (PHP endpoint)
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              const cart = JSON.parse(xhr.responseText);
              update_cart(cart);
          } else {
              console.error('Error fetching image options:', xhr.statusText);
          }
      }
  };
  xhr.open('GET','./get_cart.php', true);
  xhr.send();
  if(!isCartOpen())
    {
      animcart();
    }
}

function update_cart(cart_data){
  cart_body=document.querySelector('#cart-container');
  // Create the main div element with id "empty_message"
        var emptyMessageDiv = document.createElement("div");
        emptyMessageDiv.id = "empty_message";

        // Create the h3 element
        var heading = document.createElement("h3");
        heading.textContent = "Cart is Empty";

        // Create the button element
        var viewmenu = document.createElement("a");
        viewmenu.classList.add("btn");
        viewmenu.textContent = "View Menu";
        viewmenu.href='./menu';

        // Append the heading and button elements to the main div
        emptyMessageDiv.appendChild(heading);
        emptyMessageDiv.appendChild(viewmenu);

        // Append the emptyMessageDiv to the document body or any other parent element

  if(cart_data.items.length!=0){
  cart_body.classList.remove('empty-cart');

  removeAllChildNodes(cart_body);
  
  items=cart_data.items;
  items.forEach(item => {
      // Create the main div element with classes "menu-card" and "cart-item"
      var menuCard = document.createElement("div");
      menuCard.classList.add("menu-card", "cart-item");

      // Create the figure element with class "card-banner" and "img-holder"
      var figure = document.createElement("figure");
      figure.classList.add("card-banner", "img-holder");

      // Set width and height styles for the figure element
      figure.style.width = "100px";
      figure.style.height = "100px";

      // Create the img element
      var img = document.createElement("img");
      img.src = item.img_url;
      img.width = 100;
      img.height = 100;
      img.loading = "lazy";
      img.alt = item.name;
      img.classList.add("img-cover");
      img.style.width = "100px";
      img.style.height = "100px";
      img.style.zIndex = "1";

      // Append the img element to the figure element
      figure.appendChild(img);

      // Create the div element for the content
      var contentDiv = document.createElement("div");
      contentDiv.style.width= '80%';

      // Create the div element with class "title-wrapper"
      var titleWrapper = document.createElement("div");
      titleWrapper.classList.add("title-wrapper");

      // Create the h3 element with class "title-3"
      var title = document.createElement("h3");
      title.classList.add("title-3");

      // Create the a element with class "card-title"
      var link = document.createElement("a");
      link.href = "#";
      link.classList.add("card-title");
      link.textContent = item.name;

      // Append the a element to the h3 element
      title.appendChild(link);

      // Create the span element with class "badge label-1"
      var badge = document.createElement("span");
      badge.classList.add("badge", "label-1");
      badge.textContent = item.label;

      // Create the span element with class "span title-2"
      var price = document.createElement("span");
      price.classList.add("span", "title-2");
      price.textContent = item.individual_total;

      // Append the badge and price elements to the title wrapper
      titleWrapper.appendChild(title);
      titleWrapper.appendChild(badge);
      titleWrapper.appendChild(price);

      // Create the div element with class "qty-wrap"
      var qtyWrap = document.createElement("div");
      qtyWrap.classList.add("qty-wrap");

      // Create the button elements for quantity control
      var minusBtn = document.createElement("button");
      minusBtn.classList.add("qtybtn");
      minusBtn.textContent = "-";
      minusBtn.dataset.operation='remove';
      minusBtn.dataset.place='cart';
      minusBtn.value=item.id
      minusBtn.onclick = function() {
        mod_cart(this,cart_body);
    };
      qtyWrap.appendChild(minusBtn);

      var qtySpan = document.createElement("span");
      qtySpan.classList.add("title-3");
      qtySpan.textContent = item.qty;
      qtyWrap.appendChild(qtySpan);

      var plusBtn = document.createElement("button");
      plusBtn.classList.add("qtybtn");
      plusBtn.textContent = "+";
      plusBtn.value = item.id;
      plusBtn.dataset.operation='add';
      plusBtn.dataset.place='cart';
      plusBtn.onclick = function() {
          mod_cart(this,cart_body);
      };
      qtyWrap.appendChild(plusBtn);

      // Create the p element with class "card-text label-1"
      var cardText = document.createElement("p");
      cardText.classList.add("card-text", "label-1");
      cardText.style.textAlign = "left";
      cardText.textContent = item.short_desc;

      // Append the title wrapper, qty wrap, and card text elements to the content div
      contentDiv.appendChild(titleWrapper);
      contentDiv.appendChild(qtyWrap);
      contentDiv.appendChild(cardText);

      // Append the figure and content div elements to the main div (menu card)
      menuCard.appendChild(figure);
      menuCard.appendChild(contentDiv);

cart_body.appendChild(menuCard);
sub_total=document.querySelector('#subtotal');
sub_total.innerText=cart_data.sub_total;
  });
}
else{
  cart_body.classList.add('empty-cart');
  removeAllChildNodes(cart_body);
  cart_body.appendChild(emptyMessageDiv);
  sub_total=document.querySelector('#subtotal');
  sub_total.innerText=cart_data.sub_total;
}
  mcart_body=document.querySelector('#cart-body');
  $('#cart-modal').modal('handleUpdate')
  toggleLoading(mcart_body);
}


function close_cart()
{
  $('#cart-modal').modal('hide');
}
$('#cart-modal').on('hide.bs.modal', function (e) {
  if(isCartOpen())
    {
      animcart();
    }
})


function animate_add_to_cart(ele){
  if(!isCartOpen())
    {
      animcart();
    }
    // var exele = document.querySelectorAll('#cldel');
    // for ( i = 0; i < exele.length; i++)
    // exele[i].remove();
    initialimg=ele.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[1]
    imgnd=ele.parentNode.parentNode.parentNode.childNodes[1].childNodes[1]
    target_parent=ele.parentNode.parentNode.parentNode.childNodes[1]
    newimg=imgnd.cloneNode(true)
    newimg.id='fli'+makeid(5);
    topoff= target_parent.getBoundingClientRect().top;
    initialimgpos=initialimg.getBoundingClientRect();
    target_parent.appendChild(newimg)
    imgpos=imgnd.getBoundingClientRect();
    fly_img_pos = newimg.getBoundingClientRect();
    cart_pos = crtbtn.getBoundingClientRect();
    data = {
      itop : imgpos.top - initialimgpos.top,
      ileft : imgpos.left - initialimgpos.left,
      left : cart_pos.left-  fly_img_pos.left,
      top : cart_pos.bottom - fly_img_pos.bottom,
      topof: topoff
    }
    newimg.style.cssText =`
    --itop :  ${data.itop.toFixed(2)}px;
    --ileft :  ${data.ileft.toFixed(2)}px;
    --left : ${data.left.toFixed(2)}px;
    --top : ${data.top.toFixed(2)}px;
    --topoff : ${data.topof.toFixed(2)}px;
    `;
    newimg.classList.add("flyimg");
    Timeout('#'+newimg.id)
}


  function Timeout(qrs) {
    setTimeout(function(){
      document.querySelector(qrs).remove();

  
  if(document.querySelector('.flyimg')==null)
  {
    if(isCartOpen())
    {
      animcart();
    }
  }}, 1800);
  }

// Set their ids

function makeid(length) {
  let result = '';
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  const charactersLength = characters.length;
  let counter = 0;
  while (counter < length) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
    counter += 1;
  }
  return result;
}

function mod_cart(ele,menu_section){
  var success=false;
  operation = ele.dataset.operation;
  place = ele.dataset.place;
  value = ele.value;
  menu_section.inert = true;
  toggleLoading(menu_section);

  var xhr = new XMLHttpRequest();
    
    // Define the request parameters
    xhr.open("POST", "./mod_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Define the callback function for when the request completes
    xhr.onload = function() {
        // Re-enable the button
        menu_section.inert = false;
        
        // Check if the request was successful
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful, handle response if needed
            data = JSON.parse(xhr.responseText);
            if(data=="Success"){
            get_cart();
            toggleLoading(menu_section);
            if(operation=="add" && place=="catalogue"){
            animate_add_to_cart(ele);}}
        } else {
            // Request failed, handle error if needed
        }
    };
    
    // Send the request with the data
    xhr.send("data=" + encodeURIComponent(value) + "&operation=" + encodeURIComponent(operation));
    return success;
}


function toggleLoading(div) {
  // var overlay = div.querySelector('.loading-overlay');
  // if (!overlay) {
  //     overlay = document.createElement('div');
  //     overlay.className = 'loading-overlay';
  //     overlay.innerHTML = `<div class="spinner"><div class="preload" data-preaload>
  //     <lottie-player src="assets/lottie/coffee-loader.json" background="transparent"  speed="0.5"  style="width: 300px; height: 300px;" loop autoplay></lottie-player>
  //     </div></div>`; // You can use any loading spinner icon here
  //     div.insertBefore(overlay, div.firstChild);
  // }
  // else if(overlay){
  // overlay.style.display = overlay.style.display === 'none' ? 'block' : 'none';
  // }
}

function removeAllChildNodes(parent) {
  while (parent.firstChild) {
      parent.removeChild(parent.firstChild);
  }
}

function mod_cart_cat(ele)
{
  menu_sect= document.querySelector("#menu");
  mod_cart(ele,menu_sect);
}