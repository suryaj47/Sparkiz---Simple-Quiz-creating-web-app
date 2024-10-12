<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparkiz</title>
    <link rel="icon" href="../index/logo.png" type="image/png">
    <style>
        body {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            background-image: url("https://images.pexels.com/photos/172277/pexels-photo-172277.jpeg?auto=compress&cs=tinysrgb&w=600");
            background-size: cover;
            background-position: center;
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
        .maincontainer {
            display: flex;
            justify-content: space-between;
            padding: 50px;
        }
        .container1, .container2 {
            background-image: url("https://images.pexels.com/photos/313563/sand-pattern-wave-texture-313563.jpeg?auto=compress&cs=tinysrgb&w=600");
            background-size: cover;
            width: 300px;
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: rgb(0, 0, 0);
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .container1 button, .container2 button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: rgba(32, 178, 203, 0.8);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container1 button:hover, .container2 button:hover {
            background-color: rgba(32, 178, 203, 1);
        }
    </style>
    <script>
        function quizcreate() {
            const id = "<?php echo $id; ?>";
            if (id) {
                window.location.href = `quizcreater.php?id=${id}`;
            } else {
                window.location.href = "quizcreater.php";
            }
        }

        function quiz() {
            const id = "<?php echo $id; ?>";
            if (id) {
                window.location.href = `quiz.php?id=${id}`;
            } else {
                window.location.href = "quiz.php";
            }
        }
    </script>
</head>
<body>
    <div class="head">
        <img src="../index/logo.png" class="logo" alt="Sparkiz logo">
        <h1>Sparkiz</h1>
    </div>

    <div class="maincontainer">
        <div class="container1">
            <h2>Do you Want to create the quiz</h2>
            <button type="button" onclick="quizcreate()">CLICK ME</button>
        </div>
        <img src="https://images.pexels.com/photos/9739196/pexels-photo-9739196.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="centerimg">
        <div class="container2">
            <h2>Do you Want to attend the quiz</h2>
            <button type="button" onclick="quiz()">CLICK ME</button>
        </div>
    </div>
</body>
</html>
