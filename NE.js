// DOM Elements
const editButton = document.getElementById('edit-profile');
const modal = document.getElementById('edit-modal');
const saveButton = document.getElementById('save-changes');
const cancelButton = document.getElementById('cancel-edit');

// Profile Details
const nameElement = document.getElementById('name');
const emailElement = document.getElementById('email');
const phoneElement = document.getElementById('phone');

// Modal Inputs
const nameInput = document.getElementById('name-input');
const emailInput = document.getElementById('email-input');
const phoneInput = document.getElementById('phone-input');

// Open Edit Modal
editButton.addEventListener('click', () => {
    modal.classList.remove('hidden');
    // Pre-fill inputs with current values
    nameInput.value = nameElement.textContent;
    emailInput.value = emailElement.textContent;
    phoneInput.value = phoneElement.textContent;
});

// Save Changes
saveButton.addEventListener('click', () => {
    // Update profile details
    nameElement.textContent = nameInput.value;
    emailElement.textContent = emailInput.value;
    phoneElement.textContent = phoneInput.value;
    // Close modal
    modal.classList.add('hidden');
});

// Cancel Edit
cancelButton.addEventListener('click', () => {
    modal.classList.add('hidden');
});
const profileIcon = document.getElementById("profile-icon");
const profileCard = document.getElementById("profile-card");
const editModal = document.getElementById("edit-modal");
const cancelEditButton = document.getElementById("cancel-edit");

// Toggle dropdown visibility
profileIcon.addEventListener("click", () => {
    profileCard.classList.toggle("hidden");
});

// Close dropdown if clicked outside
window.addEventListener("click", (e) => {
    if (!profileCard.contains(e.target) && e.target !== profileIcon) {
        profileCard.classList.add("hidden");
    }
});

// Close edit modal
cancelEditButton.addEventListener("click", () => {
    editModal.classList.add("hidden");
});

// Add event listener to "Edit Profile" button
document.getElementById("edit-profile").addEventListener("click", () => {
    editModal.classList.remove("hidden");
});

