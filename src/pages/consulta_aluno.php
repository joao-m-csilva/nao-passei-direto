<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../styles/cadastro-aluno.css">
</head>

<body>

<div class="container">
    <div class="secao-principal">

        <h1>Consulta de Alunos</h1>

        <form method="GET">
            <input type="text" name="Buscar" placeholder="Digite o nome do aluno">
            <button type="submit">Buscar</button>
        </form>

        <?php
        // 🔧 caminho corrigido
        $db = new SQLite3('../database/alunos.db');

        $busca = $_GET['Buscar'] ?? '';

        $result = $db->query("SELECT * FROM alunos WHERE nome LIKE '%$busca%'");

        while ($aluno = $result->fetchArray()) {
            echo "<p>Nome: " . $aluno['nome'] . "<br>Email: " . $aluno['email'] . "</p>";
        }
        ?>

    </div>
</div>

</body>
</html>
