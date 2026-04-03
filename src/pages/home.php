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
require("../includes/total_cadastros.php");

if (isset($_POST['logout'])) {
    logout();
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/favicon-32x32.png">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/home.css">
    <title>Home</title>
</head>

<body>

    <?php if (isset($_SESSION['logged']) || empty(session_id())) { ?>
        <main>
            <section id="nav-menu">
                <?php include("../includes/nav-menu.php"); ?>
            </section>

            <section id="conteudo">
                <h1>Sistema de cadastro de alunos</h1>

                <div id="total-cadastrado">
                    <p>Alunos cadastrados: <?php echo $total_cadastrado; ?></p>
                </div>

                <div id="tabela">
                    <h2>Lista de alunos cadastrados</h2>
                    <div class="scroll-container">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Nome</th>
                                    <th>Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($aluno = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr>
                                        <td><?= $aluno['matricula'] ?></td>
                                        <td><?= $aluno['nome'] ?></td>
                                        <td><?= $aluno['curso'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <footer id="footer-kiza">
                    <p>Acompanhe a Kiza:</p>
                    <div class="links-kiza">
                        <a href="https://discord.gg/kiza" target="_blank">Discord</a>
                        <a href="https://youtube.com/@kiza" target="_blank">YouTube</a>
                    </div>
                </footer>
            </section>
        </main>
    <?php } ?>

</body>

<script src="../assets/js/deny_acess.js"></script>

</html>