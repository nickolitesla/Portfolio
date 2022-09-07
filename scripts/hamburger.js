//HAMBURGER MENU
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

const navLink = document.querySelectorAll(".nav-link");


navLink.forEach(n => n.addEventListener("click", closeMenu));

function mobileMenu() {
    hamburger.classList.toggle("active-hamburger");
    navMenu.classList.toggle("active-hamburger");
}

function closeMenu() {
    console.log("this is running")
    hamburger.classList.remove("active-hamburger");
    navMenu.classList.remove("active-hamburger");
}