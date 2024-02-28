<?php

    require_once "./db/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email= trim($_POST["email"]);
    $rawPassword = trim($_POST["password"]);

    //Hashing the password to be safe;
    $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);
    //To verify password
    //if(password_verify($inputed_password, $hasedpassword ->from database));
    //{proceed to homepage};
    

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, reg_date) VALUES (?, ?, ?, NOW())");
    

    if ($stmt) {
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "New record created successfully";
            $stmt->close();
            header("location: views/login.php");
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            header("location: views/welcome.php");
        }
    } else {
        // If the statement was not prepared successfully
        echo "Error preparing statement: " . $conn->error;
    }
}
