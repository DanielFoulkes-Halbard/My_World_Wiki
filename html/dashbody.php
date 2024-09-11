<?php 
session_start();

$stmt = $pdo->prepare("SELECT * FROM  worlds WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$worlds = [];

if (!empty($results)){
    foreach ($results as $result){
        $name = $result['name'];
        $worlds[$name] = $result['world_id'];
    }
}
?>

<div id="dashcontent">
    <p> Welcome to your own World Wiki, <?php echo $_SESSION['username']; ?> </p>
    <p>
        <?php 
        if(!empty($worlds)){
            echo  "Select a world:";
            echo "<br>";

            $worldnames = array_keys($worlds);

            foreach($worldnames as $worldname){
                $userId = htmlspecialchars($_SESSION['user_id'], ENT_QUOTES);  // Properly escape user_id
                $escapedWorld = htmlspecialchars($worldname, ENT_QUOTES);         // Properly escape world name
                $world_id = htmlspecialchars($worlds[$worldname], ENT_QUOTES);
                
                echo "<br><input type='button' class='world-button' onclick=\"openWorld('$userId', '$world_id', '$worldname')\" value='$escapedWorld'><br>";
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
