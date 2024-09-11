<?php
session_start();
require_once 'dbconnect.php';

$user_id = $_SESSION['user_id'];
$world_id = $_SESSION['world_id'];
$world_name = $_SESSION['world_name'];

$stmt = $pdo->prepare("SELECT * FROM worlds WHERE world_id = ? AND user_id = ?");
$stmt->execute([$world_id, $user_id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$description = $result['description'];
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name="My World Wiki user world about page" content="My World Wiki user world about page">
        <link rel="stylesheet" href="html/CSS/styles.css" type="text/css">
        <title>My World Wiki</title>
    </head>

    <body>
        <?php include __DIR__ . '/html/world_header.php'; ?>

        <main>
        <?php echo $description ?>;
        </main>

        <?php include __DIR__ . '/html/footer.php'; ?>

        <script src="js/scripts.js"> </script>

    </body>

</html>