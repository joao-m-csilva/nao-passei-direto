<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['logged'])) {
    header("Location: ../../index.php");
    exit();
}

include("../includes/functions.php");

if (isset($_POST['logout'])) {
    logout();
    header("Location: ../../index.php");
    exit();
}

set_time_limit(0);
ob_implicit_flush(true);
if (ob_get_level()) ob_end_flush();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/favicon-32x32.png">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/seeds.css">
    <title>🌱 Gerar Seed</title>
</head>

<body>
    <main>
        <section id="nav-menu">
            <?php include("../includes/nav-menu.php"); ?>
        </section>

        <section id="main-content">
            <h1>Seed para popular o banco</h1>

            <?php if (!isset($_POST['generate'])): ?>
                <form action="" method="post">
                    <p>Quantidade de registros a gerar:</p>
                    <input type="number" name="quantidade" min="1" max="500000" required>
                    <br><br>
                    <button type="submit" name="generate" id="btnGerar"> Gerar cadastros </button>
                </form>
            <?php else: ?>
                <div id="status-container" style="margin-top: 20px;">
                    <h2 style="font-size: 2rem;">Status: <span id="porcentagem">0</span>%</h2>
                    <p id="detalhes">Iniciando processamento...</p>
                </div>

                <?php
                session_write_close();
                require("../includes/acess_db.php");

                $quantidade_total = (int)$_POST['quantidade'];
                $nomes = ["João", "Maria", "Pedro", "Ana", "Lucas", "Julia", "Marcos", "Beatriz"];
                $sobrenomes = ["Silva", "Santos", "Oliveira", "Souza", "Pereira", "Carvalho"];
                $cursos = ["Engenharia", "Sistemas de Informação", "Direito", "Medicina"];

                try {
                    $connection->exec("TRUNCATE TABLE alunos");
                    $stmt = $connection->prepare("INSERT INTO alunos (nome, telefone, curso, cpf, email, data_nasc) VALUES (:nome, :tel, :curso, :cpf, :email, :data)");

                    echo str_repeat(' ', 1024);
                    flush();

                    for ($i = 1; $i <= $quantidade_total; $i++) {
                        $nome_completo = $nomes[array_rand($nomes)] . " " . $sobrenomes[array_rand($sobrenomes)];
                        $cpf_gerado = str_pad($i, 11, "0", STR_PAD_LEFT);
                        $email = "aluno" . $i . "@exemplo.com";
                        $tel_gerado = "319" . rand(10000000, 99999999);

                        $stmt->execute([
                            ':nome'  => $nome_completo,
                            ':tel'   => $tel_gerado,
                            ':curso' => $cursos[array_rand($cursos)],
                            ':cpf'   => $cpf_gerado,
                            ':email' => $email,
                            ':data'  => rand(1990, 2005) . "-01-01"
                        ]);

                        if ($i % 500 == 0 || $i == $quantidade_total) {
                            $progresso = round(($i * 100) / $quantidade_total);
                            echo "<script>
                                    document.getElementById('porcentagem').innerHTML = '$progresso';
                                    document.getElementById('detalhes').innerHTML = 'Semeando registro $i de $quantidade_total...';
                                  </script>";
                            flush();
                        }
                    }

                    echo "<script>
                            alert('Seed finalizado com sucesso!');
                            window.location.href = 'home.php';
                          </script>";
                    exit();
                } catch (PDOException $e) {
                    echo "<p>Erro crítico: " . $e->getMessage() . "</p>";
                }
                ?>
            <?php endif; ?>
        </section>
    </main>
    <script src="../assets/js/deny_acess.js"></script>
</body>

</html>