// OPEN/CLOSE BURGER MENU
const burger = document.querySelector(".btn-burger");
const navMenu = document.querySelector(".main-nav");
const navLink = document.querySelectorAll(".nav-link");

mobileMenu = () => {
    burger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

burger.addEventListener("click", mobileMenu);

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    burger.classList.remove("active");
    navMenu.classList.remove("active");
}