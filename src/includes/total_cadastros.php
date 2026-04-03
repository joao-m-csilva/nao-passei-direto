<?php 

require ('acess_db.php');

$query = "SELECT * FROM alunos";

$consulta = $connection->query($query);

$total_cadastrado = $consulta->rowCount();

?>