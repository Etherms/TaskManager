<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Task Manager</title>
    <link rel="stylesheet" href="../css/login-register.css">
</head>
<body>
    <div id="background">
        <form action="../register-controller.php" method="post" id="register-form">
            <h1 class="register-title">Register</h1>
            <p class="register-phase">Please fill this form to register</p>
            <div class="input-field">
                <label for="username" class="register-label">Username</label>
                <input type="text" name="username" class="register-input">
            </div>
            <div class="input-field">
                <label for="email" class="register-label">Email</label>
                <input type="email" name="email" class="register-input">
            </div>
            <div class="input-field">
                <label for="password" class="register-label">Password</label>
                <input type="password" class="register-input" name="password">
            </div>
            <div class="shw-field">
                <input type="checkbox" name="showPassword" id="show-password">
                <label for="showPassword" id="shw-btn-phrs">Show Password</label>
            </div>
            <button type="submit" class="register-btn">Sign Up</button>
            <p>Already have an Account <a href="./login.php">Login</a></p>
        </form>
    </div>
</body>
</html>