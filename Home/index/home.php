<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparkiz</title>
    <link rel="icon" href="logo.png" type="image/png">
    <style>
        body {
            background-image: url("bg.jpeg");
            background-size: cover;
            background-position: center;
            
            font-family: Arial, sans-serif;
            color: rgb(0, 0, 0);
        }

        .head {
            display: flex;
            align-items: center;
            font-size: 40px;
            padding: 20px;
            width: 100%;
            height: 170px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .logo {
            padding-top: 15px;
            width: 150px;
            height: 150px;
        }

        h1 {
            color:black ;
            margin-left: 25px;
        }

        .para1 {
            width: 750px;
            margin-top: 30px;
            font-size: 40px;
            padding: 10px 30px;
            background-color: chartreuse;
            border: 2px double black;
            border-radius: 10px;
            text-align: center;
        }

        .para2 {
            background-color: rgb(204, 158, 158);
            width: 800px;
            padding: 10px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 35px;
            margin: 30px auto;
            text-align: center;
        }

        .in2up {
            display: flex;
            justify-content: center;
            margin-top: 45px;
        }

        .signin, .signup {
            background-image: linear-gradient(rgba(141, 183, 146, 0.5), rgba(75, 128, 69, 0.5)), url("bglogin.jpeg");
            background-size: cover;
            background-position: center;
            width: 200px;
            height: 300px;
            margin-right: 30px;
           margin-bottom: 50px;
            border: 2px double #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .signin img, .signup img {
            width: 100px;
            height: 100px;
        }

        .signin p, .signup p {
            margin-top: 15px;
            font-size: 15px;
        }

        .signin button, .signup button {
            margin-top: 20px;
            border-color: #000;
            border-radius: 30px;
            width: 100px;
            height: 40px;
            cursor: pointer;
        }

        .how-to-section {
            width: 100%;
            background-color: #333;
            padding: 50px 20px;
            color: white;
        }

        .how-to-section h1 {
            text-align: center;
            font-size: 40px;
            margin-bottom: 50px;
        }

        .steps {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .step {
            background-color: #444;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            max-width: 300px;
            color: white;
        }

        .step-header {
            background-color: #555;
            color: #ccc;
            font-size: 24px;
            border-radius: 10px;
            padding: 10px 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .step-description {
            font-size: 18px;
            line-height: 1.5;
        }

        @media (max-width: 800px) {
            .steps {
                flex-direction: column;
                align-items: center;
            }

            .step {
                max-width: 90%;
                margin-bottom: 30px;
            }

            .in2up {
                flex-direction: column;
            }

            .signin, .signup {
                width: 90%;
                max-width: 300px;
                margin-bottom: 30px;
            }

            .para1, .para2 {
                width: 90%;
            }
        }
    </style>
    <script>
        function opensignin(){
            window.location.href = '../loginpage/login.php';
        }
        function opensignup(){
            window.location.href = '../loginpage/signup page.php';
        }
    </script>
</head>
<body>
    <div class="head">
        <img src="logo.png" class="logo" alt="Sparkiz logo">
        <h1>Sparkiz</h1>
    </div>

    <marquee scrollamount="25" scrolldelay="20">
        <div class="para1"><b>Craft an Amazing Quiz in Just Minutes!</b></div>
    </marquee>

    <div class="para2"><b>Sparkiz lets you design stunning quizzes effortlessly!!</b></div>

    <div class="in2up">
        <div class="signin">
            <img src="signin.png" alt="Sign In">
            <p><b>If you already have an account</b></p>
            <button onclick="opensignin()">Sign In</button>
        </div>
        <div class="signup">
            <img src="signin.png" alt="Sign Up">
            <p><b>If you don't have an account</b></p>
            <button onclick="opensignup()">Sign Up</button>
        </div>
    </div>

    <div class="how-to-section">
        <h1>How to make a quiz</h1>
        <div class="steps">
            <div class="step">
                <div class="step-header">1</div>
                <div class="step-description">
                    <b>Login</b><br>
                    Login into the site .Incase of new user  , Signup!!
                </div>
            </div>
            <div class="step">
                <div class="step-header">2</div>
                <div class="step-description">
                    <b>Write your questions</b><br>
                    Add your question and mark the correct answer and submit!!
                </div>
            </div>
            <div class="step">
                <div class="step-header">3</div>
                <div class="step-description">
                    <b>Share with your network</b><br>
                    Send out your quiz via a quiz number and Enjoyy!!!
                </div>
            </div>
        </div>
    </div>
</body>
</html>
