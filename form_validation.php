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

?>