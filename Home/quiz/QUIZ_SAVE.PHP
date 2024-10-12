<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logdet";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$title = isset($_POST['title']) ? $_POST['title'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$questions = isset($_POST['questions']) ? json_decode($_POST['questions'], true) : [];

// Generate a special code (can be random or based on timestamp)
$specialCode = isset($_POST['quizCode']) ? $_POST['quizCode'] : ''; // Generates a 6-character random code

// Debug: Check the received data
if (!$title || !$questions) {
    die("Invalid input");
}

// Insert quiz into `quizzes` table, including the special code
$sql = "INSERT INTO quizzes (title, user_id,description, code) VALUES ('$title','$id', '$description', '$specialCode')";
if ($conn->query($sql) === TRUE) {
    $quizId = $conn->insert_id;
    echo "Quiz inserted with ID: $quizId and special code: $specialCode<br>";

    foreach ($questions as $q) {
        $questionText = $q['questionText'];
        $correctOption = $q['correctOption'];

        // Insert question into `questions` table
        $sql = "INSERT INTO questions (quiz_id, question_text, correct_option) VALUES ('$quizId', '$questionText', '$correctOption')";
        if ($conn->query($sql) === TRUE) {
            $questionId = $conn->insert_id;

            foreach ($q['options'] as $letter => $text) {
                // Insert options into `options` table
                $sql = "INSERT INTO options (question_id, option_letter, option_text) VALUES ('$questionId', '$letter', '$text')";
                $conn->query($sql);
            }
        }
    }

    echo "Quiz saved successfully!";
} else {
    echo "Error inserting quiz: " . $conn->error;
}

$conn->close();
?>
