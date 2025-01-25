document.addEventListener('DOMContentLoaded', function () {
    // Handle search icon click
    const searchIcon = document.querySelector(".search-icon a");
    searchIcon.addEventListener("click", (event) => {
        event.preventDefault();
        const searchTerm = prompt("Enter a recipe name or keyword:");
        if (searchTerm) {
            alert(`Searching for recipes related to: ${searchTerm}`);
            // Add functionality to filter or search recipes based on the input
        }
    });

    // Handle profile icon click
    const profileIcon = document.querySelector(".profile a");
    profileIcon.addEventListener("click", (event) => {
        event.preventDefault();
        alert("Redirecting to your profile...");
        // Add redirect logic to the profile page if necessary
    });

    // Handle "View Recipe" button clicks on cards
    document.querySelectorAll(".card button a").forEach(button => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const recipeName = button.closest(".card").querySelector("h3").textContent;
            alert(`Viewing details for: ${recipeName}`);
            // Optionally, redirect to the respective recipe page
            window.location.href = button.href;
        });
    });

    // Handle footer social media links
    document.querySelectorAll(".footer-icons ul li a").forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const platform = link.querySelector("i").classList[1].split("-")[1];
            alert(`Redirecting to our ${platform} page...`);
            // Optionally, redirect to the respective social media page
            // window.location.href = link.href;
        });
    });

    // Mobile screen message
    if (window.innerWidth < 480) {
        console.log("You are on a small screen, and the layout is optimized for mobile!");
    }
});
