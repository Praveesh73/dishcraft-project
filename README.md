# Dishcraft- Digital Recipe Book
…Where Recipes Come to Life…

Dishcraft is a web-based platform where users can explore, create and share their favorite recipes. Built with HTML, CSS, Bootstrap, PHP and MySQL. it enables user account management, recipe submissions, and profile customization. This project is part of the COM 2303 - Web Design course at Rajarata University of Sri Lanka.


## Project Structure

This project includes the following main features:
-	User Sign Up /User Sign In
-	View Recipe & Create Recipe 
- Legal Pages (Privacy Policy, Cookie Policy, Terms & Conditions, Refund Policy)
-	User profile Editing & Profile Picture Upload
-	Responsive UI with Bootstrap
-	Footer with Social links

### Tech Stack

- **Frontend:** HTML5, CSS3, Bootstrap 5, Font Awesome
- **Backend:** PHP
- **Database:** MySQL

## Folder Structure
```
dishcraft-project/
├── css/
├── fonts/
├── images/
├── js/
├── php/
│ ├── db.php
│ ├── signup.php
│ ├── signin.php
│ ├── profile/
│ │ ├── display_profile.php
│ │ └── update_profile.php
├── legal/
│ ├── privacy-policy.php
│ ├── cookie-policy.php
│ ├── refund-policy.php
│ └── terms-and-conditions.php
├── index.html
├── signin.html
├── signup.html
├── home.html
```

## Features

- **Secure User Authentication:** Users can sign up and sign in securely.
- **Editable Profile Page:** Users can update their profile details and upload a new profile picture.
- **Legal Compliance:** All necessary legal policy pages are included.
- **Responsive Design:** Built using Bootstrap to ensure mobile-friendliness.

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/Gihansa079/dishcraft-project.git
   cd dishcraft-project
Set up your database:

Import the dishcraft.sql file into your MySQL server.

Configure php/db.php with your database credentials.

Run the project:

Use a local server like XAMPP or WAMP.

Place the project folder in the htdocs directory.

Access it from http://localhost/Dishcraft-project

Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

License
This project is for educational purposes and may be reused or modified freely with attribution.

Made with by Gihansa @ Rajarata University

ASP/2022/079

5871
---

Let me know if you want to customize it further, like adding contributor details, screenshots, or badges!
