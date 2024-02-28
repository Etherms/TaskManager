<?php
require_once "../db/config.php";


// function generateOTP($length = 6) {
//     $otp = '';
//     for($i=0; $i< $length; $i++){
//         $otp = rand(0,9); //Generate random digit;
//     }
//     return $otp;
// }

$encryptionKey = "EHRMTNOS";

function encryptData($data,$key){
    return openssl_encrypt($data, 'aes-256-cbc',$key, 0, substr($key, 0, 16));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $rawEmail = trim($_POST["email"]);
    $rawPassword = trim($_POST["password"]);
    
    if (!filter_var($rawEmail, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = $rawEmail;
        $encryptedEmail = encryptData($email,$encryptionKey);
    }

    $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, reg_date) VALUES (?, ?, ?, NOW())");
    
    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sss", $username, $encryptedEmail, $hashedPassword);
        
        if ($stmt->execute()) { 
            // Redirect to login page if registration is successful
            header("Location: ../views/login.php");
            exit(); // Terminate script execution after redirection
        } else {
            echo "Error: " . $stmt->error;
            header("Location: ../views/welcome.php");
            exit();
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

