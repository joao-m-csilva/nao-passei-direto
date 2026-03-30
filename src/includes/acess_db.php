<?php 

$db_user = "root";
$db_pass = "root@root";

try {

    $connection = new PDO('mysql:host=localhost; dbname=crud_hackathon', $db_user, $db_pass);
  

}catch(PDOException $e) {
    print("Erro ao conectar com o banco de dados. " . $e -> getMessage());
}

?>