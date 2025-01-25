const menuOpenButton = document.querySelector("#menu-open-btn");
const menuCloseButton = document.querySelector("#menu-close-btn");


menuOpenButton.addEventListener("click", () => {
    document.body.classList.toggle("show-mobile-menu");
});

menuCloseButton.addEventListener("click", () => {
    document.body.classList.remove("show-mobile-menu"); // Directly remove the class to close the menu
});
