
<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <div class="profile">
            <img src="#" alt="profile-icon" class="profile-picture">
            <p class="profile-email"><?php echo "hermosaedson459@gmail.com"?></p>
        </div>
        <div class="navbar-row">
            <img src="" alt="home-icon" class="home-icon navbar-icon">
            <a href="#" class="nav-link">Home</a>
        </div>
        <div class="dashboard-row">
            <img src="" alt="dashboard-icon" class="dashboard">
            <a href="#" class="nav-link">Dashboard</a>
        </div>
    </div>
        <a href="../controllers/logout-controller.php  " class="logout-btn">Logout</a>
</body>
</html>