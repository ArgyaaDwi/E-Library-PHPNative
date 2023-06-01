var dataprofile = document.getElementById("dataprofile");
var profile = document.getElementById("profile");
var closebtn = document.getElementsByClassName("close-btn")[0];

dataprofile.addEventListener("click", function() {
  profile.style.display = "block";
  cart.style.display = "none";
  hstry.style.display = "none";
});

closebtn.addEventListener("click", function() {
  profile.style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == profile) {
    profile.style.display = "none";
  }
});

var datacart = document.getElementById("datacart");
var cart = document.getElementById("cart");
var closebtn1 = document.getElementsByClassName("close-btn1")[0];

datacart.addEventListener("click", function() {
  cart.style.display = "block";
  profile.style.display = "none";
  hstry.style.display = "none";
});
closebtn1.addEventListener("click", function() {
  cart.style.display = "none";
});
window.addEventListener("click", function(event) {
  if (event.target == cart) {
    cart.style.display = "none";
  }
});

var datahstry = document.getElementById("datahstry");
var hstry = document.getElementById("hstry");
var closebtn2 = document.getElementsByClassName("close-btn2")[0];

datahstry.addEventListener("click", function() {
  hstry.style.display = "block";
  cart.style.display = "none";
  profile.style.display = "none";
});
closebtn2.addEventListener("click", function() {
  hstry.style.display = "none";
});
window.addEventListener("click", function(event) {
  if (event.target == hstry) {
    hstry.style.display = "none";
  }
});