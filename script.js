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

  crtbtn.addEventListener('click', function() {
    if (buttonTl.time() > 0) {
      buttonTl.reverse();
      
    } else {
      buttonTl.play(0);
    }
  })

  function addtocart(ele){
    var exele = document.querySelectorAll('#cldel');
    for ( i = 0; i < exele.length; i++)
    exele[i].remove();
  
    initialimg=ele.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[1]
    imgnd=ele.parentNode.parentNode.parentNode.childNodes[1].childNodes[1]
    target_parent=ele.parentNode.parentNode.parentNode.childNodes[1]
    newimg=imgnd.cloneNode(true)
    newimg.id='cldel';
    initialimgpos=initialimg.getBoundingClientRect();
    target_parent.appendChild(newimg)
    imgpos=imgnd.getBoundingClientRect();
    fly_img_pos = newimg.getBoundingClientRect();
    cart_pos = crtbtn.getBoundingClientRect();
    data = {
      itop : imgpos.top - initialimgpos.top,
      ileft : imgpos.left - initialimgpos.left,
      left : cart_pos.left-  fly_img_pos.left,
      top : cart_pos.bottom - fly_img_pos.bottom
    }
    console.log(data);
    newimg.style.cssText =`
    --itop :  ${data.itop.toFixed(2)}px;
    --ileft :  ${data.ileft.toFixed(2)}px;
    --left : ${data.left.toFixed(2)}px;
    --top : ${data.top.toFixed(2)}px;
    `;
    newimg.classList.add("flyimg");
    setTimeout(function(){newimg.remove()}, 1800);
  }
// Set their ids

