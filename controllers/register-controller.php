<?php
require_once "../db/config.php";


function encryptData($data,$key){
        $iv = openssl_random_pseudo_bytes(16);
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $encrypted);
        return $result;
}

function getDataForm($scope){
    $encryptionKey = "EHRMTNOS";

    if(isset($_POST[$scope])){
        $rawData = trim($_POST[$scope]);
    }

    if($scope == 'email'){ // Use comparison operator ==
        if (!filter_var($rawData, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            return encryptData($rawData, $encryptionKey);
        }
    } else if($scope == 'password'){ // Use comparison operator ==
        return password_hash($rawData, PASSWORD_DEFAULT);
    }
    return $rawData;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = getDataForm('username');
    $encryptedEmail = getDataForm('email');
    $hashedPassword = getDataForm('password');


    $stmt = $conn->prepare("INSERT INTO users (username, email, password, reg_date) VALUES (?, ?, ?, NOW())");
    
    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sss", $username, $encryptedEmail, $hashedPassword);
        
        if ($stmt->execute()) { 
            // Redirect to login page if registration is successful
            $accountNotification = "Account Created Successfully";
            header("Location: ../views/login.php?accountNotification=" . urlencode($accountNotification));
            exit(); // Terminate script execution after redirection
        } else {
            echo "Error: " . $stmt->error;
            header("Location: ../views/register.php");
            exit();
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

