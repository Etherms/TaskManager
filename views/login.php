<?php
    session_start();

    //Check if user is already logged in, if yes redirect to dashboard
    if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"] === true){
        header("location: ./welcome.php");
        exit;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Manager </title>
    <link rel="stylesheet" href="../css/login-register.css"> 
</head>
<body>
    <div id="background">
        <form action="../controllers/login-controller.php" method="post" id="login-form">
            <h1 class="login-title">Login</h1>
            <p class="login-phrase">Please login to continue</p>
            <div class="login-notification">
                <p>
                    <?php 
                    if(isset($_GET['password_err'])) {
                        $password_err = $_GET['password_err'];
                        echo $password_err;
                    }
                    if(isset($_GET['username_err'])) {
                        $username_err = $_GET['username_err'];
                        echo $username_err;
                    }?>    
                </p>
            </div>
            <div class="input-field">
                <label for="name" class="login-label">Email or Username</label>
                <input type="text" name="username" class="login-input">
            </div>
            <div class="input-field">
                <label for="password" class="login-label">Password</label>
                <input type="password" name="password" id="password" class="login-input">
            </div>
            <div class="shw-field">
                <input type="checkbox" name="showPassword" id="show-password">
                <label for="showPassword" id="shw-btn-phrs">Show Password</label>
            </div>
            <button type="submit" class="login-btn">Login</button>

            <p>Don't have an account? <a href="./register.php">Sign Up</a></p>
        </form>
    </div>
</body>
<script src="../js/show-password.js" defer></script>
</html>