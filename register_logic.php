<?php

require_once 'dbconnect.php'; ## Connects to db
require_once 'form_validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_SPECIAL_CHARS);
    
    $errors = validatRegisterForm($username,$email,$password);

    if(empty($errors)){
        try {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            ## Check unique user info
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            ## $stmt->bindParam("ss", $username, $email); this is not used in PDO
            $stmt->execute([$username, $email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                echo "Username or email already exists!";
            }
            else{
                $stmt = $pdo->prepare("INSERT INTO users (user_id, username, password, email) VALUES (?, ?, ?, ?)");
                $stmt->execute([uniqid(), $username, $hashed_password, $email]);
                $pdo = null; ## this closes the connection

                ## Route back to landing page
                header('Location: /my_world_wiki/index.php');
                exit;
            }
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    else{
        foreach($errors as $error) {
            echo "<br>" .$error;
        }
    }
}
?>