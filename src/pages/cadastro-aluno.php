<?php 

require('../includes/acess_db.php');


if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $curso = $_POST['curso'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $data_nasc = $_POST['data'];


    $query_cadastro = "INSERT INTO alunos(nome, telefone, curso, cpf, email, data_nasc) VALUES ('$nome', '$telefone', '$curso', '$cpf', '$email', '$data_nasc') ";

    $cadastro_tabela = $connection->query($query_cadastro);

     echo("<script>alert('Cadastro realizado com sucesso.');</script>");

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/src/styles/cadastro_aluno.css">
    <title>Cadastro do Usuário</title>
</head>
<body>
    
    <main class="container">
        <section>
            <?php 
                include('../includes/nav-menu.php')
            ?>
        </section>

        <section class="secao-principal">
            <header class="cabecalho">
                <h1>Cadastro de Alunos</h1>
                <p>Adicione um novo aluno ao sistema</p>
            </header>
            <h2>Dados do Aluno</h2>
            <p>Preencha todos os campos para cadastrar um novo aluno</p>

            <form action="cadastro-aluno.php" method="POST">

                <div class="nome">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="telefone">
                    <label for="telefone">Telefone *</label>
                    <input type="number" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                </div>
                <div class="curso">
                    <label for="curso">Curso *</label>
                    <input type="text" id="curso" name="curso" required>
                </div>
                <div class="cpf">
                    <label for="cpf">CPF *</label>
                    <input type="number" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
                <div class="email">
                    <label for="email">Email *</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="data">
                    <label for="data">Data de Nascimento *</label>
                    <input type="date" id="data" name="data" required> 
                </div>

                <div class="acoes">
                    <button type="enviar" class="btn-cadastro" name="enviar" id="enviar">Cadastrar Aluno</button>
                    <button type="button" class="btn-cancelar">Cancelar</button>
                </div>

            </form>
        </section>
    </main>

</body>
</html>