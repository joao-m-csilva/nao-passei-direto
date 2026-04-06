<?php
require('../includes/acess_db.php');

if (isset($_POST['enviar'])) {
    function apenasNumeros($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }

    $nome = $_POST['nome'];
    $telefone = apenasNumeros($_POST['telefone']);
    $curso = $_POST['curso'];
    $cpf = apenasNumeros($_POST['cpf']);
    $email = $_POST['email'];
    $data_nasc = $_POST['data'];

    if (strlen($cpf) != 11) {
        echo ("<script>alert('Erro: O CPF deve conter exatamente 11 dígitos.'); history.back();</script>");
        exit;
    }

    $query_cadastro = "INSERT INTO alunos (nome, telefone, curso, cpf, email, data_nasc) 
                       VALUES (:nome, :telefone, :curso, :cpf, :email, :data_nasc)";

    try {
        $stmt = $connection->prepare($query_cadastro);
        $stmt->execute([
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':curso' => $curso,
            ':cpf' => $cpf,
            ':email' => $email,
            ':data_nasc' => $data_nasc
        ]);
        echo ("<script>alert('Cadastro realizado com sucesso.'); window.location.href='consultar-alunos.php';</script>");
    } catch (PDOException $e) {

        echo ("<script>alert('Erro ao cadastrar: Verifique se e-mail ou CPF já existem.'); history.back();</script>");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/styles/cadastro_aluno.css">
    <title>Cadastro do Usuário</title>
</head>
<body>

    <main class="container">
        <section id="nav-menu">
            <?php include("../includes/nav-menu.php"); ?>
        </section>

        <section class="secao-principal">
            <header class="cabecalho">
                <h1>Cadastro de Alunos</h1>
                <p>Adicione um novo aluno ao sistema</p>
            </header>

            <form action="" method="POST">
                <div>
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div>
                    <label for="telefone">Telefone *</label>
                    <input type="text" id="telefone" name="telefone" placeholder="(00) 00000-0000" maxlength="15" required>
                </div>

                <div>
                    <label for="curso">Curso *</label>
                    <input type="text" id="curso" name="curso" required>
                </div>

                <div>
                    <label for="cpf">CPF *</label>
                    <input type="text" id="cpf" name="cpf" placeholder="Apenas números" maxlength="11" required>
                </div>

                <div>
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="data">Data de Nascimento *</label>
                    <input type="date" id="data" name="data" required>
                </div>

                <div class="acoes">
                    <button type="submit" class="btn-cadastro" name="enviar">Cadastrar Aluno</button>
                    <button type="reset" class="btn-cancelar">Limpar</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>