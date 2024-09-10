<?php
session_start();

require_once 'dbconnect.php';
require_once 'form_validation.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $world_name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
    $img = "Placeholder";

    $errors = validateCreateWorldForm($world_name, $description, $img);

    if(empty($errors)){
        try {
            $stmt = $pdo->prepare("INSERT INTO worlds (world_id, user_id, name, description) VALUES (?,?,?,?)");
            $stmt->execute([uniqid(), $_SESSION['user_id'], $world_name, $description]);

            header("Location: /my_world_wiki/dashboard.php");
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    else {
        foreach($errors as $error){
            echo "<br>" . $error; 
        }
    }
}

?>