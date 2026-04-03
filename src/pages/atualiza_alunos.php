<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['logged'])) {
    header("Location: ../../index.php");
    exit();
}

require("../includes/acess_db.php");
include("../includes/functions.php");

if (isset($_POST['logout'])) {
    logout();
    header("Location: ../../index.php");
    exit();
}

$matricula = $_GET['matricula'] ?? null;
$aluno = null;

if ($matricula) {
    $query_busca = "SELECT * FROM alunos WHERE matricula = $matricula";
    $consulta = $connection->query($query_busca);
    $aluno = $consulta->fetch(PDO::FETCH_ASSOC);
}

if (!$aluno) {
    header("Location: consulta_aluno.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/favicon-32x32.png">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/atualizar_alunos.css">
    <title>Atualizar Cadastro</title>
</head>

<body>

    <?php if (isset($_SESSION['logged']) || empty(session_id())) { ?>
        <main>
            <section id="nav-menu">
                <?php include("../includes/nav-menu.php"); ?>
            </section>

            <section id="conteudo">
                <header>
                    <h1>Atualizar dados de: <?= htmlspecialchars($aluno['nome']) ?></h1>
                </header>

                <div class="container-form">
                    <form action="../includes/atualiza_cadastro.php" method="POST" class="cls_formulario">
                        
                        <input type="hidden" name="matricula" value="<?= $aluno['matricula'] ?>">

                        <div class="div_input">
                            <label class="lb_input">Nome Completo</label>
                            <input type="text" class="cls_input" name="nome" value="<?= htmlspecialchars($aluno['nome']) ?>" required>
                        </div>

                        <div class="div_input">
                            <label class="lb_input">Telefone</label>
                            <input type="text" class="cls_input" name="telefone" value="<?= htmlspecialchars($aluno['telefone']) ?>" required>
                        </div>

                        <div class="div_input">
                            <label class="lb_input">Curso</label>
                            <input type="text" class="cls_input" name="curso" value="<?= htmlspecialchars($aluno['curso']) ?>" required>
                        </div>

                        <div class="div_input">
                            <label class="lb_input">CPF</label>
                            <input type="text" class="cls_input" name="cpf" value="<?= htmlspecialchars($aluno['cpf']) ?>" required>
                        </div>

                        <div class="div_input">
                            <label class="lb_input">Email</label>
                            <input type="email" class="cls_input" name="email" value="<?= htmlspecialchars($aluno['email']) ?>" required>
                        </div>

                        <div class="div_input">
                            <label class="lb_input">Data de Nascimento</label>
                            <input type="date" class="cls_input" name="data_nasc" value="<?= $aluno['data_nasc'] ?>" required>
                        </div>

                        <div class="div-btn-atualiza">
                            <button type="submit" name="btn-atualizar" class="btn-atualiza">Salvar Alterações</button>
                        </div>
                    </form>
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

    <script src="../assets/js/deny_acess.js"></script>

</body>

</html>