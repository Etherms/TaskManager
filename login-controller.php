<?php
    session_start();

    require_once "./db/config.php";

    $admin_username = $admin_password = "admin";
    $username = $password ="";
    $username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //check if username has value
    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
    } else {
        $username_err = "Please enter username.";
    }

    //check if password has value
    if (isset($_POST["password"])) {
        $password = trim($_POST["password"]);
    } else {
        $password_err = "Please enter password.";
    }

    //check if username and password is correct;
    if (empty($username_err) && empty($password_err)) {
        if ($username === $admin_username && $password === $admin_password) {
            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            header("location: views/welcome.php");
            exit; // Add exit to stop further execution
        } else {
            $password_err = "The username or password you entered was not valid.";
        }
    }
}
?>