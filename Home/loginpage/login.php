<?php include('../index/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparkiz Login</title>
    <link rel="icon" href="../logo.png" type="image/png">
 <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    position: relative;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    }

.background-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
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
    z-index: 2;
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

.login-container {
    height: 250px;
    width: 480px;
    background-color: rgb(44, 44, 47);
    padding: 20px;
    border-radius: 5px;
    z-index: 1;
    position: relative;
    }

.login-container h2 {
    color: #fff;
    margin: 0 0 15px;
    text-align: center;
    }

.login-container input {
    width: 90%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #e21b1b;
    border-radius: 3px;
    }

.buttonlog {
    display: flex;
    justify-content: space-between; /* Space between buttons */
    margin-top: 20px;
       }

.buttonlog button {
    width: 48%; /* Adjust button width to fit side by side */
    padding: 10px;
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

    <img src="login.png" class="background-img" alt="background image">
    
    <div class="head">
        <img src="../index/logo.png" class="logo" alt="Sparkiz logo">
        <h1>Sparkiz</h1>
    </div>
 
    <div class="login-container">
        <b><h2>Login</h2></b>
        <form id="loginForm"  method="post" action="login.php">
        <?php include('../index/errors.php'); ?>
  	
            <input type="text" id="username" placeholder="Username" name="username" required>
            <br>
            <input type="password" id="password" placeholder="Password" name="password" required>
            <div class="buttonlog">
                
            <button onclick="back()">Back</button>
            <button type="submit" name="login_user">Login</button>
        </form>
            </div>
    </div>

    <script>
        function back(){
            window.location.href="../index/home.php";
        }
    
    </script>

</body>
</html>
