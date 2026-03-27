<?php 

// Conexão com banco de dados

// Credenciais de acesso ao db
$server = "localhost";
$server_user = "root";
$server_password = "root@root";
$db = "crud_hackathon";

// Conexão

$connect = mysqli_connect($server, $server_user, $server_password, $db);

if($connect->connect_error) {
    die("Conexão não estabelecida" . $connect -> connect_error);

}

?>      