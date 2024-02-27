<?php
    session_start();

    //Check if user is already logged in, if yes redirect to dashboard
    if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"] === true){
        header("location: views/welcome.php");
        exit;
    }


    $admin_username = $admin_password = "admin";
    $username = $password ="";

    $username_err = $password_err = "";
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
        echo "username set";
    } else {
        $username_err = "Please enter username.";
        echo "no username";
    }

    if (isset($_POST["password"])) {
        $password = trim($_POST["password"]);
    } else {
        $password_err = "Please enter password.";
    }

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