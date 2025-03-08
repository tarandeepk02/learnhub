Learn Hub is a web-based learning management system (LMS) designed to manage and track quizzes, courses, and user performance. The system includes different portals for students, teachers, and administrators, each with its own set of features.
Key Features:
Student Portal: Students can take quizzes, track their performance, and enroll in courses.
Teacher Portal: Teachers can create courses and quizzes for students.
Admin Portal: Admin can monitor and manage users.
This project uses PHP for the backend, Bootstrap for the frontend, and MySQL (MariaDB) for the relational database.

Installation Instructions
Step 1: Upload the Files: Upload the learnhubpro.zip file to your xampp/htdocs directory.
Step 2: Set Up the Database: Open phpMyAdmin by visiting localhost/phpmyadmin in your browser. Import the learnhubpro.sql file provided into the database.
Step 3: Configure the Database Connection: Open the includes/config.php file. Update the database username and password according to your phpMyAdmin configuration. Default: Username: root, Password: '' (empty string). Change it if you have different credentials.
Step 4: Access the Project: After completing the previous steps, open your browser and visit localhost/learnhubpro.
Step 5: You're Good to Go!

You should now be able to access and use the Learn Hub system.

Dependencies
PHP: Version >= 8.0
MySQL: Version 10.4.32-MariaDB 

Project Structure
includes/ - Contains configuration and core functionalities.
assets/ - CSS, JS, and other static files.
index.php - Main entry point for the application.
