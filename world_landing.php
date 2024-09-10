<?php
session_start();

if(isset($_GET['world_id'])){
    $_SESSION['world_id'] = $_GET['world_id'];
    echo $_SESSION['user_id'];
    echo "<br>";
    echo $_SESSION['world_id'];
}
?>