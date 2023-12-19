/*==================== MENU SHOW Y HIDDEN ====================*/
const navClose = document.getElementById("nav-close");
const navToggle = document.getElementById("nav-toggle");
const navMenu = document.getElementById("nav-menu");

/*===== MENU SHOW =====*/
/* Validate if constant exists */
if (navToggle) {
    navToggle.addEventListener("click", () => {
        navMenu.classList.add("nav-show");
    });
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
if (navClose) {
    navClose.addEventListener("click", () => {
        navMenu.classList.remove("nav-show");
    });
}

/*==================== REMOVE MENU MOBILE ====================*/
const navLinks = document.querySelectorAll(".nav-link");

navLinks.forEach((navLink) =>
    navLink.addEventListener("click", () => {
        navMenu.classList.remove("nav-show");
    })
);

    


/*==================== CHANGE BACKGROUND HEADER ====================*/
function scrollHeader() {
    const nav = document.getElementById("header");
    if (this.scrollY >= 10) nav.classList.add("scroll-header");
    else nav.classList.remove("scroll-header");
}

window.addEventListener("scroll", scrollHeader);
/*==================== SHOW SCROLL UP ====================*/
function scrollUp() {
    const scrollUp = document.getElementById("scrollUp");
    if (this.scrollY >= 560) scrollUp.classList.add("show-scrollUp");
    else scrollUp.classList.remove("show-scrollUp");
}

window.addEventListener("scroll", scrollUp);

/*==================== DARK LIGHT THEME ====================*/

const themeButton = document.getElementById("theme-button");
const darkTheme = "dark-theme";
const sunIcon = "uil-sun";
let theme = localStorage.getItem("alexa-theme");

if (theme) {
    document.body.classList[theme === "dark" ? "add" : "remove"](darkTheme);
    themeButton.classList[theme === "dark" ? "add" : "remove"](sunIcon);
}

themeButton.addEventListener("click", function () {
    this.classList.toggle(sunIcon);
    document.body.classList.toggle(darkTheme);

    theme = document.body.classList.contains(darkTheme) ? "dark" : "light";
    localStorage.setItem("alexa-theme", theme);
});
