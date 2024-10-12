<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
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

// Ensure all required parameters are received
if (isset($_GET['userid']) && isset($_GET['marks']) && isset($_GET['total']) && isset($_GET['quizCode'])) {
    $userid = $_GET['userid'];
    $marks = $_GET['marks'];
    $total = $_GET['total'];
    $quizCode = $_GET['quizCode'];  // Alphanumeric quiz code

    // Output values for debugging
    echo "User ID: $userid <br>";
    echo "Marks: $marks <br>";
    echo "Total: $total <br>";
    echo "Quiz Code: $quizCode <br>";

    // Prepare and bind the SQL statement (use "s" for string for quizCode)
    $stmt = $conn->prepare("INSERT INTO marks (user_id, marks, total, quiz_id) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters (quizCode is now alphanumeric, so use "s" for string)
    if (!$stmt->bind_param("iiis", $userid, $marks, $total, $quizCode)) {
        die("Binding parameters failed: " . $stmt->error);
    }

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} 

// Close the connection
$conn->close();
?>
