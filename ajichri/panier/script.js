'use strict';



/**
 * navbar toggle
 */

const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");

const navElems = [overlay, navOpenBtn, navCloseBtn];

for (let i = 0; i < navElems.length; i++) {
  navElems[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
  });
}



/**
 * header & go top btn active on page scroll
 */

const header = document.querySelector("[data-header]");
const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 80) {
    header.classList.add("active");
    goTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    goTopBtn.classList.remove("active");
  }
});
function showAlert(){
  var myAlert = document.getElementById("myAlert");
move();
 
  myAlert.className = "show";

  setTimeout(function(){hideAlert(); }, 5000);
}

function hideAlert(){
  myAlert.className = myAlert.className.replace("show", "");
}


var i = 0;
function move() {
  if (i == 0) {
    var elem = document.getElementById("myAlertBar");
    var width = 1;
    var interval = setInterval(frame, 50);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        interval = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}