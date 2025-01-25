const image_input = document.querySelector("#image_input");
const display_image = document.querySelector("#display_image");

image_input.addEventListener("change", function() {
    const reader = new FileReader();

    reader.addEventListener("load", () => {
        const uploaded_image = reader.result;
        display_image.style.backgroundImage = `url(${uploaded_image})`;
        display_image.textContent = "";  // Clear the placeholder text
    });

    if (this.files[0]) {
        reader.readAsDataURL(this.files[0]);
    }
});


const menuOpenButton = document.querySelector("#menu-open-btn");
const menuCloseButton = document.querySelector("#menu-close-btn");

menuOpenButton.addEventListener("click", () => {
    document.body.classList.toggle("show-mobile-menu");
});

menuCloseButton.addEventListener("click", () => {
    document.body.classList.remove("show-mobile-menu");
});