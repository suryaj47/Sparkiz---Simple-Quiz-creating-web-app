<?php include('../index/server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparkiz Sign Up</title>
    <link rel="icon" href="../index/logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            overflow: hidden;
            font-family: Arial, sans-serif;
            background-image: url("bgsignup.jpg" );
        }
        
        .head {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            position: absolute;
            top: 20px;
            right: 0;
            left: 0;
            z-index: 1;
            background-color: rgba(1, 154, 141, 0.8);
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }
        .logo {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }
        h1 {
            color: black;
            margin: 0;
            font-size: 30px;
        }
        .signup-container {
            margin-top: 400px;
            z-index: 2;
            height: 300px;
            width: 350px;
            background-color: rgba(44, 44, 47, 0.9);
            padding: 20px;
            border-radius: 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .signup-container h2 {
            color: #fff;
            margin: 0 0 15px;
            text-align: center;
        }
        .signup-container input {
            width: 250px;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #e21b1b;
            border-radius: 3px;
            background-color: #fff;
        }
        .signup-container button {
            width: 90%;
            padding: 10px;
            margin-top: 20px;
            margin-left: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
        }
        .buttonlog {
    display: flex;
    justify-content: space-between;

    margin-top : 10px;
}
        .signup-container button:hover {
            background-color: #0056b3;
        }
        .te{
           
            background-color: white;
        }
        
    </style>
</head>
<body>

   
    
    <div class="head">
        <img src="../index/logo.png" class="logo" alt="Sparkiz logo">
        <h1>Sparkiz</h1>
    </div>
    
    <div class="signup-container">
        <b><h2>Sign Up</h2></b>
        <p class ="te">Once Sign up , You are redirected to home page, you can sign in with your new credentials</p>        
        <form id="signupForm" method="post" action="signup page.php">
            
            <input type="text" id="username" placeholder="username" name="username" value="<?php echo $username; ?>" required >
            <br>
            <input type="text" id="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
            <br>
            <input type="password" id="password" placeholder="Password" name="password_1" required>
            <br>
            <input type="password" id="retypePassword" placeholder="Retype Password" name="password_2" required>
            <br>
            <div class="buttonlog">
                
                <button onclick="back()">Back</button>
                <button type="submit" name="reg_user">Sign up</button>
            </div>
        </form>
    </div>

    <script>
        function back(){
            window.location.href="../index/home.php";
        }
    </script>

</body>
</html>

