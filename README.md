Learn Hub: Web-Based Learning Management System (LMS): 
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

SQL Queries
  Here are the types of SQL queries implemented in the project:

  Projection Query:  
    File: view_user.php
    This query selects specific columns (attributes) from a table to be displayed in the application.
  
  Selection Query:  
    File: index.php
    This query selects specific rows (records) from a table that satisfy certain conditions.
  
  Join Query:  
    File: view_courses.php, Submission.php
    This query joins the Courses and Users tables to find the names of all teachers associated with a specific course.
  
  Division query: 
    File: view_courses.php
    Method: Find users S such that There is no courses C Which is not enrolled by S

  Aggregation Query:  
    File: view_user.php
    This query performs aggregation operations like COUNT, SUM, AVG, MIN, or MAX on selected data.
    
  Nested Aggregation with Group-By:  
    File: view_user.php
    This query combines aggregation with grouping data, using GROUP BY to organize rows into groups before applying aggregate functions.
 
  Delete Operation:  
    File: view_question.php
    This query is used to delete specific rows from a table, typically when a user deletes a question or record.
  
  Update Operation:  
    File: (File name not specified, but can be inferred)
    This query is used to update specific records in a table, modifying existing data based on certain conditions.

<img width="591" alt="erd" src="https://github.com/user-attachments/assets/197f12fd-57a7-4230-abc0-2d8862e6f092" />


