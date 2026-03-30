<?php 

require("src/includes/acess_db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if(!empty($email) && !empty($senha)){
    $senha_hash = md5($senha);
    $sql = "SELECT * FROM admin_users WHERE email='$email' AND password='$senha_hash'";
    $login = $connection->query($sql);
    // var_dump($login->rowCount()); die();

    if($login->rowCount() == 1){
        session_start();
        $_SESSION['id'] = $email;
        $_SESSION['password'] = $senha;
        $_SESSION['logged'] = true;
        header("Location: src/pages/home.php");
        
    }else{
        echo("<script>alert('Usuário ou senha inválidos.');</script>");
    }
    }else{
        if(empty($_POST['email'])){
            echo("<script>alert('O campo email deve ser preenchido.');</script>");
        }elseif(empty($_POST['senha'])){
            echo("<script>alert('O campo senha deve ser preenchido.');</script>");
        }
    }
}
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/assets/img/favicon-32x32.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="src/styles/login-style.css">
    <title>Não Passei Direto</title>
</head>
<body>
    <form action="index.php" autocomplete="off" method="POST">
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