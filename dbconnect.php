<?php
$host = 'localhost';
$db = 'my_world_wiki';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';


#$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throws exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch data as associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Disable emulated prepared statements
];


try {
    $pdo =  new PDO("mysql:host=$host;dbname=$db", $user, $pass, $options);
    ##echo "Connected to the database successfully!";
} catch(\PDOException){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>