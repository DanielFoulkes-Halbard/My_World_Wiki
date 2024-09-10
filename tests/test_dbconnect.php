<?php

// Include the dbconnect.php file to establish the connection
include __DIR__ . '/../dbconnect.php';

try {
    // A simple query to test the connection
    $stmt = $pdo->query('SHOW TABLES');

    echo "<h2>Tables in the Database:</h2>";

    // Fetch and display the tables in the database
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        echo $row[0] . "<br>"; 
    }

    // If there are no tables, inform the user
    if($stmt->rowCount() == 0){
        echo "No tables found in the database.";
    }

} catch(PDOException $e){
    // In case of error, display the error message
    echo "Error: " . $e->getMessage();
}
?>