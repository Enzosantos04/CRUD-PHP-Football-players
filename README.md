# Football Legends Website

A simple CRUD (Create, Read, Update, Delete) web application built using PHP, HTML, CSS, and phpMyAdmin. This website allows you to manage football player information, including adding, updating, deleting, and viewing players' profiles and images. The website also includes a login page where only the admin can access the CRUD functionalities.

## Features
- **Add Players**: Admin can add new players with details like name, position, and an image.
- **Update Players**: Admin can update the existing players' information.
- **Delete Players**: Admin can remove players from the database.
- **View Players Card**: Player's page to display Cards.
- **View Players Details**: Players' information and images displayed as a unique.
- **Admin Login**: Only the admin can access the CRUD functionality.
  
## Technologies Used
- **PHP**: For backend logic and database operations.
- **HTML & CSS**: For frontend design and layout.
- **MySQL**: Database management using phpMyAdmin.
- **XAMPP**: A local development environment for running Apache, MySQL, and PHP.

## Setup Instructions

### Prerequisites
1. Install **XAMPP** (Apache + MySQL) on your machine:
   - Download XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org).
   - Follow the installation instructions specific to your operating system.

2. Install **phpMyAdmin** (comes bundled with XAMPP):
   - After installing XAMPP, start the **Apache** and **MySQL** services from the XAMPP control panel.

3. Database setup:
   - Open phpMyAdmin from the XAMPP control panel by going to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a new database, for example, `football_legend`.
   - Import the SQL file to the database (the players.sql file is inside the code )
   
### How to Use the Code

1. **Clone the Repository**
   - Clone this repository to your local machine using the following command:
     ```bash
     git clone https://github.com/yourusername/football-legends.git
     ```

2. **Configure Database**
   - Navigate to your XAMPP installation directory (`htdocs`) and place the project folder inside it (e.g., `htdocs/football-legends`).
   - Update the database connection in `functions.php` to match your database credentials:
     ```php
     $db_host = 'localhost';
     $db_user = 'mri'; // username for XAMPP
     $db_pass = 'password'; //  password for XAMPP is empty
     $db = 'players'; //  database name
     ```

3. **Admin Login**
   - Access the admin login page via `http://localhost/football-legends/login.php`.
   - Use the credentials defined in your code (you may want to set up a secure login system with hashed passwords for better security).
   - Username: admin Password: admin

4. **Access the CRUD Operations**
   - After logging in as admin, you will have access to the following CRUD functionalities:
     - **Add Player**: Add a new player with details and an image.
     - **Update Player**: Update details of existing players.
     - **Delete Player**: Delete players from the database.
     - **View Players**: View player information on the website.

### How to Run the Project

1. Start Apache and MySQL using the XAMPP control panel.
2. Open a browser and go to `http://localhost/football-legends`.
3. The website should load, and you can interact with the CRUD functionalities.
