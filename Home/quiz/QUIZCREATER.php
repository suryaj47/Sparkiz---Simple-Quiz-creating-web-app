<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sparkiz Quiz Creator</title>
    <link rel="icon" href="../index/logo.png" type="image/png">
    <style>
        body {
            background-color: #65a5a5;
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
        .formm {
            background-color: rgba(53, 255, 60, 0.885);
            margin-left: 400px;
            margin-top: 25px;
            padding-left: 170px;
            width: 600px;
            height: 300px;
            font-size: 30px;
        }
        .formm input, .formm textarea {
            margin-bottom: 25px;
            font-size: 20px;
            width: 90%;
        }
        .buttonn {
            display: flex;
            justify-content: space-around;
            margin-top: 25px;
            width: 600px;
            margin-left: 500px;
        }
        .buttonn button {
            width: 45%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }
        .buttonn button:hover {
            background-color: #0056b3;
        }
        .quiz_container {
            padding: 10px;
            font-size: 20px;
            background-color: aquamarine;
            width: 750px;
            margin-top: 50px;
            margin-left: 400px;
        }
        .question {
            width: 600px;
            font-size: 20px;
        }
        .quiz_code {
            font-size: 25px;
            text-align: center;
            margin-top: 20px;
            color: white;
        }
        .form_container {
            margin-top: -10px;
            width: 500px;
        }
        .buttonlog {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .buttonlog button {
            width: 100px;
            padding: 10px;
            margin-top: 20px;
            margin-left: 750px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
        }
        .buttonlog button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="head">
        <img src="../index/logo.png" class="logo" alt="Sparkiz logo" width="150px" height="150px">
        <h1>Sparkiz</h1>
    </div>

    <div class="formm">
        <h1>Create a Quiz</h1>
        <form class="form_container" id="quiz-form" onsubmit="return false;">
            <label for="title">Quiz Title :</label>
            <input type="text" id="title" placeholder="Enter quiz title" required><br>
            <label for="description">Description:</label>
            <textarea id="description" placeholder="Enter quiz description"></textarea><br>
        </form>
    </div>

    <div id="questions-container" class="quiz_container">
        <!-- Questions will be added here dynamically -->
    </div>

    <div class="buttonn">
        <button type="button" onclick="addQuestion()">Add Question</button>
        <button type="button" onclick="createQuiz()">Create Quiz</button>
    </div>

    <div class="quiz_code" id="quiz-code"></div>
    <div class="buttonlog">
        <button onclick="back()">Back</button>
    </div>

    <script>
        let questionIndex = 0;

        function addQuestion() {
            const container = document.getElementById('questions-container');
            const questionDiv = document.createElement('div');
            questionDiv.id = `question-${questionIndex}`;

            questionDiv.innerHTML = `
                <h3>Question ${questionIndex + 1}</h3>
                <input class="question" type="text" name="question-text" placeholder="Enter question" required><br><br>
                <label for="correct-text"><b>CORRECT ANSWER:</b></label><br>
                <input class="crtoption" type="text" name="correct-option" placeholder="Correct option (A, B, C, D)" required><br><br>
                <label><b>OPTIONS:</b></label><br>
                <input type="text" class="options" name="option-A" placeholder="Option A" required>
                <input type="text" class="options" name="option-B" placeholder="Option B" required><br>
                <input type="text" class="options" name="option-C" placeholder="Option C" required>
                <input type="text" class="options" name="option-D" placeholder="Option D" required><br>
                <hr>
            `;
            
            container.appendChild(questionDiv);
            questionIndex++;
        }

        function createQuiz() {
            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;

            if (!title || !description) {
                alert("Please fill in the quiz title and description.");
                return;
            }

            let questions = [];
            for (let i = 0; i < questionIndex; i++) {
                const questionDiv = document.getElementById(`question-${i}`);
                const questionText = questionDiv.querySelector('[name="question-text"]').value;
                const correctOption = questionDiv.querySelector('[name="correct-option"]').value;
                const options = {
                    A: questionDiv.querySelector('[name="option-A"]').value,
                    B: questionDiv.querySelector('[name="option-B"]').value,
                    C: questionDiv.querySelector('[name="option-C"]').value,
                    D: questionDiv.querySelector('[name="option-D"]').value,
                };

                if (!questionText || !correctOption || !options.A || !options.B || !options.C || !options.D) {
                    alert(`Please fill in all fields for Question ${i + 1}.`);
                    return;
                }

                questions.push({
                    questionText,
                    correctOption,
                    options
                });
            }

            const quizCode = Math.random().toString(36).substr(2, 9);

            const formData = new FormData();
            const id = "<?php echo $id; ?>";
            formData.append('title', title);
            formData.append('description', description);
            formData.append('questions', JSON.stringify(questions));
            formData.append('quizCode', quizCode);
            formData.append('id', id);

            fetch('quiz_save.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('quiz-code').innerHTML = `Quiz Created! Your code is: <b>${quizCode}</b>`;
            });
        }
        function back(){
            window.location.href="../index/home.php";
        }
    </script>
</body>
</html>
