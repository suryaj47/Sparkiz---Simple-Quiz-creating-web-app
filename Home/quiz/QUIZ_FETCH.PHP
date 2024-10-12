<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// MySQL connection details
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

// Get quiz code from GET request
$quizCode = isset($_GET['code']) ? $_GET['code'] : '';

if ($quizCode === '') {
    echo json_encode(['error' => 'Quiz code is missing']);
    exit();
}

// Fetch quiz details
$sql = "SELECT id, title, description FROM quizzes WHERE code='$quizCode'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $quiz = $result->fetch_assoc();
    $quizId = $quiz['id'];

    // Fetch questions
    $sql = "SELECT id, question_text, correct_option FROM questions WHERE quiz_id='$quizId'";
    $questionsResult = $conn->query($sql);
    $questions = [];

    while ($question = $questionsResult->fetch_assoc()) {
        $questionId = $question['id'];

        // Fetch options for each question
        $sql = "SELECT option_letter, option_text FROM options WHERE question_id='$questionId'";
        $optionsResult = $conn->query($sql);
        $options = [];

        while ($option = $optionsResult->fetch_assoc()) {
            $options[$option['option_letter']] = $option['option_text'];
        }

        $questions[] = [
            'question_text' => $question['question_text'],
            'correct_option' => $question['correct_option'],
            'options' => $options
        ];
    }

    echo json_encode([
        'title' => $quiz['title'],
        'description' => $quiz['description'],
        'questions' => $questions
    ]);
} else {
    echo json_encode(['error' => 'Quiz not found']);
}

$conn->close();
?>
