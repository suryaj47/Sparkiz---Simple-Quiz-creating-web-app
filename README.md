Sparkiz Quiz Creation Web App

Overview
The Quiz Creation Web App is a platform for creating, managing, and taking quizzes. Users can create quizzes with multiple questions and options, set correct answers, and view the results of quiz participants. The app provides a clean and user-friendly interface for both quiz creators and quiz takers, making it suitable for educational platforms, training systems, or fun quiz-based interactions.

Features
User Authentication: Secure user registration and login.
Quiz Creation: Easily create quizzes with multiple-choice questions.
Question Bank: Add, edit, or delete questions and options.
Quiz Management: View, edit, or delete quizzes.
Quiz Taking: Allow users to attempt quizzes and submit answers.
Result Tracking: Log quiz results for each user and quiz.

Tech Stack
Frontend: HTML, CSS, JavaScript 
Backend: PHP
Database: MySQL or MariaDB (SQL schema provided)

Table Structure (Database)
This application uses a MySQL database to store all quiz-related data. Here's a breakdown of the main tables:

1. users
Stores user information, including quiz creators and takers.

id: Unique ID for each user.
username: The username for login.
password: Encrypted password.
email: User’s email address.

2. quizzes
Stores general information about quizzes created by users.

id: Unique ID for each quiz.
title: Title of the quiz.
description: A brief description of the quiz.
created_by: ID of the user who created the quiz.

3. questions
Contains the questions associated with each quiz.

id: Unique ID for each question.
quiz_id: The ID of the quiz the question belongs to.
question_text: The actual text of the question.

4. options
Holds the answer options for each question.

id: Unique ID for each option.
question_id: The ID of the question.
option_text: The text for the option.
is_correct: Indicates whether the option is correct.

5. results
Logs quiz results for each user who takes a quiz.

id: Unique result ID.
quiz_id: The ID of the quiz taken.
user_id: The ID of the user who took the quiz.
score: The score the user achieved.

Installation
Prerequisites

PHP 7.4 or higher
MySQL or MariaDB
A web server (e.g., Apache, Nginx)

Setup Instructions
1.Clone the repository:

git clone https://github.com/your-username/quiz-creation-app.git

2.Set up the database:

Create a new MySQL database (e.g., logdet_db).
Import the provided SQL schema

3.Configure the environment:

Update your .php files with the following details:

php

<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'your-username');
define('DB_PASS', 'your-password');
define('DB_NAME', 'quiz_app_db');

// Session configuration
session_start();
?>

4.Set up the server: 

Place the project files in your web server's root directory (htdocs for XAMPP, or /var/www/html for Apache/Nginx).

Run the app: Access the app at http://localhost/quiz-creation-app (or your configured domain).



Usage

1. User Authentication
Register as a new user or log in with existing credentials.
Once logged in, users can access the dashboard to create or manage quizzes.

2. Creating a Quiz
Navigate to "Create Quiz" in the dashboard.
Enter a title and description for the quiz, then add questions and answer options.
Specify the correct answer for each question.

3. Taking a Quiz
Users can select a quiz from the available quizzes and answer the questions.
Upon submission, the user's score will be calculated and logged.

4. Viewing Results
Users can view their quiz results in the dashboard.
Quiz creators can review all quiz attempts and scores for quizzes they created.
total_score: The total possible score for the quiz.
