<?php
session_start();
require_once 'dbconnect.php';
require_once 'form_validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = filter_var(trim($_POST['topic']), FILTER_SANITIZE_STRING);
    $type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
    $content = filter_var(trim($_POST['content']), FILTER_SANITIZE_STRING);
    $img = "placeholder";

    $errors = validateCreateArticleForm($title, $type, $content, $img);

    if (empty($errors)){
        try{
            $stmt = $pdo->prepare("INSERT INTO articles (article_id, user_id, world_id, topic, content, article_type) VALUES (?,?,?,?,?,?)");
            $stmt->execute([uniqid(), $_SESSION['user_id'] , $_SESSION['world_id'], $title, $content, $type]);

            header("Location: /my_world_wiki/world_landing.php");
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    else {
        foreach($errors as $error){
            echo "<br>" . $error;
        }
        printLog($title);
        printLog($content);
        printLog($type);
    }
}
else{echo "Problem";}
?>