<?php 
require_once "src/includes/acess_db.php";

$email = $_POST['email'];
$senha = md5($_POST['senha']);



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="src/styles/login-style.css">
    <title>Não Passei Direto</title>
</head>
<body>
    <form action="index.php" autocomplete="off" method="post">
        <h2>Sistema de Alunos</h2>
        <div>
            
            <p>E-mail:</p> <label for="email"><input type="email" name="email" id="email" placeholder="seu@email.com"></label>
            <p>Senha:</p>  <label for="senha"><input type="password" name="senha" id="senha" placeholder="abcd"></label>
            <br>
            <input type="submit" value="Login" class="botao">
        </div>
    </form>
</body>
</html>