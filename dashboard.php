<?php
require_once 'dbconnect.php';
require_once 'form_validation.php';

?>

<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="My World Wiki user dashboard" content="My World Wiki user dashboard">
        <link rel="stylesheet" href="html/CSS/styles.css" type="text/css">
        <title>User Dashboard</title>
    </head>

    <body>

        <?php include __DIR__ . '/html/header.php'; ?>

        <main>
            <?php include __DIR__ . '/html/dashbody.php'; ?>
        </main>

        <?php include __DIR__ . '/html/footer.php'; ?>

        <script src="js/scripts.js"> </script>
    </body>
</html>