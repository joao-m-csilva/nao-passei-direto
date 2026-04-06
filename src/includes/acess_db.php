<?php 

$db_user = "root";
$db_pass = "root@root";

$sql_security = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                 
];

try {

    $connection = new PDO('mysql:host=localhost; dbname=crud_hackathon', $db_user, $db_pass, $sql_security);
    $connectionSttus = true;
  
}catch(PDOException $e) {
    $connectionSttus = false;
}