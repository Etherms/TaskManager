<?php
session_start();

require_once "../db/config.php";

$admin_username = $admin_password = "admin";
$username = $password ="";
$username_err = $password_err = "";
$encryptionKey = "EHRMTNOS";




// Decryption for email
function decryptData($encryptedData,$key){
    $initializeVector = substr($encryptedData, 0, 16);
    $encryptedDataWithoutIV = substr($encryptedData, 16);

    return openssl_decrypt($encryptedDataWithoutIV, 'aes-256', $key, 0, $initializeVector);
}
    





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


        $stmt = $conn->prepare("SELECT user_id, username, email, password FROM users WHERE username = ?");

        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($id, $db_username, $db_username_email, $hashedPassword);


        if($stmt->fetch()){
            if(password_verify($password,$hashedPassword)){
                session_start();

                 $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
    
                header("location: ../views/welcome.php");
                exit;
            }
            else {
                $password_err = "The username or password you entered was not valid";
                header("Location: ../views/login.php?password_err=" . urlencode($password_err));
                exit;
            }
        }
        else{
            $username_err = "The username or password you entered was not valid";
            header("Location: ../views/login.php?username_err=" . urlencode($username_err));
            exit;
        }
    }
}
?>