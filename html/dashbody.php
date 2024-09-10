<?php 

$stmt = $pdo->prepare("SELECT * FROM  worlds WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$worlds = [];

if (!empty($results)){
    foreach ($results as $result){
        $worlds[] = $result['name'];
    }
}
?>

<div id="dashcontent">
    <p> Welcome to your own World Wiki, <?php echo $_SESSION['username']; ?> </p>
    <p>
        <?php 
        if(!empty($worlds)){
            echo  "Select a world:";

            foreach($worlds as $world){
                "<br><input type='button' class='world-button' onclick=\"openWorld('dashcontent', 'world_body.php')\" value='" . htmlspecialchars($world) . "'>";
            }
        }
        else{
            echo "You have not created any worlds yet.";
        }
        ?>
    </p>

    <div class="button-dash">
        <input type='button' onclick="loadLandingContent('dashcontent', 'new_world_form.php')" value = "Create new world">
    </div>
</div>