<?php 

require ('acess_db.php');

$query = "SELECT * FROM alunos";

$consulta = $connection->prepare($query);
$consulta->execute();

$total_cadastrado = $consulta->rowCount();

?>