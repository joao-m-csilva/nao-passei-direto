<?php 

$db_user = "root";
$db_pass = "root@root";

try {

    $connection = new PDO('mysql:host=localhost; dbname=crud_hackathon', $db_user, $db_pass);
  

}catch(PDOException) {
    print("Erro ao conectar com o banco de dados. ");
}

echo("Conexão bem sucedida.")

?>


