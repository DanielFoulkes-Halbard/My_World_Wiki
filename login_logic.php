<?php
session_start();

require_once "dbconnect.php";
require_once "form_validation.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

    $errors = validateLoginForm($username, $password);

    if(empty($errors)){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['password'])){
            ## logged the user in and sent to dashbaord
            $_SESSION['username'] = $result['username'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['logged_in'] = true;

            header('Location: /my_world_wiki/dashboard.php');
        }
        else {
            echo "<script src ='js/scripts.js'></script>";
            $message = "Username or Password is incorrect";
            echo "<script>loginAlert('". $message ."');</script>";
        }
    }
    else{
        foreach($errors as $error){
            echo "<br>" . $error;
        }
    }
}
?>