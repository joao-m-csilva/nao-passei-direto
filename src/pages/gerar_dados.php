<?php

if (isset($_POST['generate'])) {
    require("../includes/acess_db.php");

    $nomes = ["João", "Maria", "Pedro", "Ana", "Lucas", "Julia", "Marcos", "Beatriz"];
    $sobrenomes = ["Silva", "Santos", "Oliveira", "Souza", "Pereira", "Carvalho"];
    $cursos = ["Engenharia", "Sistemas de Informação", "Direito", "Medicina"];
    $quantidade_cadastros = $_POST['quantidade'];
    $values = [];

 /**
 * Altere o valor 300 para a quantidade de registros que deseja
 * incluir no banco de dados.
 */

    for ($i = 1; $i <= $quantidade_cadastros; $i++) {

        $nome_completo = $nomes[array_rand($nomes)] . " " . $sobrenomes[array_rand($sobrenomes)];


        $telefone = "319" . rand(10000000, 99999999);

        $curso = $cursos[array_rand($cursos)];


        $cpf = rand(100, 999) . rand(100, 999) . rand(100, 999) . rand(10, 99);

        $email = "aluno" . bin2hex(random_bytes(2)) . "@exemplo.com"; // Email mais aleatório
        $data_nasc = rand(1990, 2005) . "-" . str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT) . "-" . str_pad(rand(1, 28), 2, "0", STR_PAD_LEFT);

        $values[] = "('$nome_completo', '$telefone', '$curso', '$cpf', '$email', '$data_nasc')";
    }
    $clean_table_query = "TRUNCATE TABLE alunos";
    $query_seed = "INSERT INTO alunos (nome, telefone, curso, cpf, email, data_nasc) VALUES " . implode(', ', $values);

    try {
        $clean_table = $connection->exec($clean_table_query);
        $linhas = $connection->exec($query_seed);
        echo "Seed executado com sucesso! $linhas alunos cadastrados.";
        header("Location: home.php");
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>

<form action="gerar_dados.php" method="post">

    <h1> Seed para popular o banco com cadastros</h1>
    Quantidade de registros a gerar: <input type="text" name="quantidade"> 
    <br>
    <button type="submit" name="generate"> Gerar cadastros </button>

</form>