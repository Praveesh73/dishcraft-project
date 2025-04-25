document.addEventListener("DOMContentLoaded", function () {
    const editButton = document.getElementById('editButton');
    const saveButton = document.getElementById('saveButton');
    const cancelButton = document.getElementById('cancelButton');
    const logoutButton = document.getElementById('logoutButton');

    // Toggle the edit section for the profile
    editButton.addEventListener('click', function () {
        toggleEdit();
    });

    // Save the edited profile data and update localStorage or send it to the server
    saveButton.addEventListener('click', function () {
        saveProfile();
    });

    // Cancel the edit and hide the edit section
    cancelButton.addEventListener('click', function () {
        document.getElementById('editSection').style.display = 'none';
    });

    // Handle user logout
    logoutButton.addEventListener('click', function () {
        logout();
    });

    // Toggle the edit section visibility and populate the input fields with current data
    function toggleEdit() {
        const section = document.getElementById('editSection');
        section.style.display = section.style.display === 'block' ? 'none' : 'block';

        // Populate the edit fields with current user data (get from session/local storage or any other source)
        document.getElementById('nameInput').value = document.getElementById('userName').innerText;
        document.getElementById('emailInput').value = document.getElementById('userEmail').innerText;
        document.getElementById('phoneInput').value = document.getElementById('userPhone').innerText;
    }

    // Save the profile changes
    function saveProfile() {
        const name = document.getElementById('nameInput').value;
        const email = document.getElementById('emailInput').value;
        const phone = document.getElementById('phoneInput').value;

        // Update the profile displayed on the page
        document.getElementById('userName').innerText = name;
        document.getElementById('userEmail').innerText = email;
        document.getElementById('userPhone').innerText = phone;

        const fileInput = document.getElementById('imageInput');
        let newProfilePic = document.getElementById('profilePic').src;

        // If a new image is selected, update the profile picture
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                newProfilePic = e.target.result;
                document.getElementById('profilePic').src = newProfilePic;
                updateProfileInDatabase(name, email, phone, newProfilePic);
            };
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            updateProfileInDatabase(name, email, phone, newProfilePic);
        }

        // Hide the edit section after saving
        document.getElementById('editSection').style.display = 'none';
    }

    // Send the updated profile data to the server
    function updateProfileInDatabase(name, email, phone, profilePic) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_profile.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('Profile updated successfully!');
            }
        };

        xhr.send("name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&phone=" + encodeURIComponent(phone) + "&profilePic=" + encodeURIComponent(profilePic));
    }

    // Handle user logout
    function logout() {
        window.location.href = 'logout.php'; // Redirect to logout page
    }
});
