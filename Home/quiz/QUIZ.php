<?php
// Check if 'id' is set in the URL parameters
if (isset($_GET['id'])) {
    $userid = $_GET['id'];
} else {
    $userid = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        .question {
            margin-bottom: 20px;
        }
        body {
            background-image: url("bg.jpg");
        }
        .head {
            display: flex;
            align-items: center;
            font-size: 40px;
            padding-left: 15px;
            width: 100%;
            height: 170px;
            background-color: rgba(32, 178, 203, 0.8);
        }
        .head h1 {
            margin-left: 10px;
        }
        .logo {
            width: 150px;
            height: 150px;
            margin-right: 10px;
        }
        .container {
            font-size: 35px;
            margin-left: 550px;
        }
        .container input {
            width: 200px;
            height: 35px;
            margin-left: 150px;
        }
        .container button {
            width: 100px;
            margin-left: 200px;
            height: 30px;
        }
        .questionsContainer {
            font-size: 25px;
            margin-left: -200px;
            padding: 10px;
            width: 750px;
            background-color: aqua;
        }
        .score-container {
         display: flex;               /* Flexbox for easy centering */
        justify-content: center;      /* Horizontal centering */
        align-items: center;          /* Vertical centering */
        width: 300px;                 /* Set a fixed width */
        height: 150px;                /* Set a fixed height */
        margin: 50px auto;            /* Center it vertically with margin */
        border: 2px solid #32a852;    /* Green border */
        background-color: #f9f9f9;    /* Light background color */
        border-radius: 10px;          /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        padding: 20px;                /* Padding for inner spacing */
        font-size: 24px;              /* Larger text */
        font-weight: bold;            /* Bold text */
        color: #333;                  /* Darker text color */
        display: none;                /* Hide initially (you already have this) */
}

    </style>
</head>
<body>
    <div class="head">
        <img src="../index/logo.png" class="logo" alt="Sparkiz logo">
        <h1>Sparkiz</h1>
    </div>
    <div class="container">
        <b><h1>Enter Quiz Code</h1></b>
        <input type="text" id="quizCode" placeholder="Enter quiz code"><br>
        <button onclick="fetchQuiz()">Load Quiz</button>

        <h2 id="quizTitle"></h2>
        <p id="quizDescription"></p>

        <div class="questionsContainer" id="questionsContainer"></div>

        <!-- Submit Button -->
        <button id="submitButton" style="display:none;" onclick="submitQuiz()">Submit Quiz</button>
    </div>

    <script>
        const crtans = {};
        const answers = {};
        let count = 0;
        
        // Function to fetch quiz based on a code
        function fetchQuiz() {
            const quizCode = document.getElementById('quizCode').value;
           
            if (quizCode === '') {
                alert('Please enter a quiz code');
                return;
            }

            // Send an AJAX request to fetch the quiz details
            fetch(`quiz_fetch.php?code=${quizCode}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Display the quiz title and description
                    document.getElementById('quizTitle').innerText = `Title: ${data.title}`;
                    document.getElementById('quizDescription').innerText = `Description: ${data.description}`;

                    // Clear previous questions
                    const questionsContainer = document.getElementById('questionsContainer');
                    questionsContainer.innerHTML = '';

                    // Display the questions and options
                    data.questions.forEach((question, index) => {
                        const questionElement = document.createElement('div');
                        questionElement.classList.add('question');
                        crtans[index] = question.correct_option;
                        questionElement.innerHTML = `<h3>Question ${index + 1}: ${question.question_text}</h3>`;

                        // Create options
                        Object.keys(question.options).forEach(optionLetter => {
                            const optionText = question.options[optionLetter];
                            const optionElement = document.createElement('div');
                            optionElement.innerHTML = `
                                <label>
                                    <input type="radio" name="question${index}" value="${optionLetter}" required>
                                    ${optionLetter}. ${optionText}
                                </label>
                            `;
                            questionElement.appendChild(optionElement);
                        });

                        // Append the question to the container
                        questionsContainer.appendChild(questionElement);
                    });

                    // Show the submit button after questions are loaded
                    document.getElementById('submitButton').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching the quiz:', error);
                    alert('Failed to fetch the quiz.');
                });
        }

        // Function to submit quiz answers
        function submitQuiz() {
            const questionsContainer = document.getElementById('questionsContainer');
            const questions = questionsContainer.getElementsByClassName('question');
            let allAnswered = true;

            // Ensure all questions are answered
            for (let i = 0; i < questions.length; i++) {
                const question = questions[i];
                const selectedOption = question.querySelector('input[type="radio"]:checked');

                if (!selectedOption) {
                    alert(`Please answer question ${i + 1}`);
                    allAnswered = false;
                    break;
                }

                answers[i] = selectedOption.value;
            }

            // Proceed only if all questions are answered
            if (allAnswered) {
                count = 0;

                // Check answers and calculate score
                for (let i = 0; i < questions.length; i++) {
                    if (answers[i] === crtans[i]) {
                        count++;
                    }
                }

                // Send the quiz result to the server
                const quizCode = document.getElementById('quizCode').value;  // Get the quizCode from the input field
                const userid = "<?php echo $userid; ?>";  // Retrieve the userid from PHP

                // Send the data using fetch to mark.php, including the quizCode as a query parameter
                fetch(`../marks/mark.php?userid=${userid}&marks=${count}&total=${questions.length}&quizCode=${quizCode}`)
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);  // Output the response for debugging
                        alert(data);  // Display success or error message
                    })
                    .catch(error => {
                        console.error('Error submitting quiz:', error);
                    });

                // Display the score after submission
                displayScore(count, questions.length);
            }
        }

        // Function to display the score dynamically
        function displayScore(marks, total) {
            const percentage = (marks / total) * 100;
            const scoreContainer = document.getElementById('scoreContainer');
            const scoreDiv = document.getElementById('score');
            scoreDiv.innerHTML = `Your Score: ${marks} / ${total} (${percentage.toFixed(2)}%)`;
            scoreContainer.style.display = 'flex'; // Show the score container
        }
    </script>

    <!-- Score Display -->
    <div class="score-container" id="scoreContainer" style="display:none;">
        <div class="score" id="score"></div>
    </div>

    <!-- Include mark.php for score processing -->
    <?php include '../marks/mark.php'; ?>
</body>
</html>
