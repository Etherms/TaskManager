
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
    <title>Home - Task Manager</title>
    <link rel="stylesheet" href="../css/navbar.css"> 
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">This is the Logo</div>
        <div class="nav-links">
            <ul>
                <a href="#" class="navbar-row">
                    <img src="../svg/overview.svg" alt="overview-icon" class="link-icon">
                    <p class="nav-desc">Overview</p>
                </a>
                <a href="#" class="navbar-row">
                    <img src="../svg/task.svg" alt="Tasks-icon" class="link-icon">
                    <p class="nav-desc">Tasks</p>
                </a>
                <a href="#" class="navbar-row">
                    <img src="../svg/document.svg" alt="documents-icon" class="link-icon">
                    <p class="nav-desc">Documents</p>
                </a>
                <a href="#" class="navbar-row">
                    <img src="../svg/notes.svg" alt="notes-icon" class="link-icon">
                    <p class="nav-desc">Notes</p>
                </a>
                <a href="#" class="navbar-row">
                    <img src="../svg/output.svg" alt="output-icon" class="link-icon">
                    <p class="nav-desc">Output</p>
                </a>
            </ul>
        </div>
    </div>
    <header>
        <div class="search-bar">
            <img src="../svg/search.svg" alt="search-icon" class="search-icon">
            <input type="text" placeholder="Search" class="search-input">
        </div>
        <div class="account-info" id="account-info">
            <img src="../img/me.jpg" alt="user-photo" class="user-photo">
            <p class="welcome-user">Hello <?php echo ucfirst($_SESSION["username"])?>!</p>
            
            <div class="setting-box" id="setting-box">
            <a href="#" class="account-settings">Account Info</a>
            <a href="#" class="give-feedback">Give Feedback</a>
            <a href="../controllers/logout-controller.php  " class="logout-btn">Logout</a>
            </div>
        </div>

        <div class="notification-holder">   
        <img src="../svg/notification.svg" alt="notification-icon" class="notification-icon">
        </div>
    </header>
    <script src="../js/account-setting.js" defer></script>
</body>
</html>