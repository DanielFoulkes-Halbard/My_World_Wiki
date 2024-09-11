<?php
session_start();

if(isset($_GET['world_id'])){
    
    $_SESSION['world_id'] = $_GET['world_id'];
    $_SESSION['world_name'] = $_GET['world_name'];

    $user_id = $_SESSION['user_id'];
    $world_id = $_SESSION['world_id'];
    $world_name = $_SESSION['world_name'];

}
else{
    $user_id = $_SESSION['user_id'];
    $world_id = $_SESSION['world_id'];
    $world_name = $_SESSION['world_name'];
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name="My World Wiki user world page" content="My World Wiki user world page">
        <link rel="stylesheet" href="html/CSS/styles.css" type="text/css">
        <title>My World Wiki</title>
    </head>

    <body>
        <?php include __DIR__ . '/html/world_header.php'; ?>

        <main>
        <?php include __DIR__ . '/html/world_body.php'; ?>
        </main>

        <?php include __DIR__ . '/html/footer.php'; ?>

        <script src="js/scripts.js"> </script>

    </body>

</html>