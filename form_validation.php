<?php
function validatRegisterForm($username, $email, $password) {
    $errors = [];   

    if(empty($username) || empty($email || empty($password))){
        $errors= "All Fields must be filled in.";
    }

    if(strlen($username) < 5){
        $errors= "Username must be 5 or more character long";
    }

    if(!preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[\?\!#]/', $password) ||
        strlen($password) < 8){
        $errors= "Password does not match the required strength";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors= "Invalid email format";
    }

    return $errors;
}

function validateLoginForm($username,$password){
    $errors = [];

    if(empty($username) || empty($password)){
        $errors= "All Fields must be filled in.";
    }

    if(strlen($username) < 5){
        $errors= "Username must be 5 or more character long";
    }

    if(!preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[\?\!#]/', $password) ||
        strlen($password) < 8){
        $errors= "Password does not match the required strength";
    }

    return $errors;
}

function validateCreateWorldForm($name, $description, $img){
    $errors = [];

    if(empty($name) || empty($description)){
        $errors[]="You must enter a name and decription for your new world";
    }

    return $errors;
    ## TODO image validation
}

function validateCreateArticleForm($title, $type, $content, $img){
    $errors = [];

    if(empty($title) || empty($content)){
        $errors[]= "You must enter an article title and content";
    }

    return $errors;
}

function setSelectedWorld($user_id, $world){
    printLog($world);
}

function printLog($message){
    echo "<script>console.log(".json_encode($message).")</script>";
}

?>