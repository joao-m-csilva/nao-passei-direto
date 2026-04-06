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


require("../includes/acess_db.php");
require("../includes/atualiza_cadastro.php");

$resultados = [];

if (isset($_POST['buscar'])) {
    $nome_busca = $_POST['nome'];
    $query = "SELECT * FROM alunos WHERE nome LIKE :nome_busca";
    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':nome_busca' => "%$nome_busca%"
    ]);

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php if (isset($_SESSION['logged']) || empty(session_id())) { ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/reset.css">
        <link rel="stylesheet" href="../styles/home.css">
        <link rel="stylesheet" href="../styles/consulta_aluno.css">
        <title>Consulta de Alunos</title>
    </head>

    <body>
        <?php if (isset($_SESSION['logged']) || empty(session_id())) { ?>
            <main>

                <section id="nav-menu">
                    <?php include("../includes/nav-menu.php"); ?>
                </section>

                <section id="conteudo">
                    <div class="header-busca">
                        <h1>Consulta de Alunos</h1>
                        <form action="consulta_aluno.php" method="POST" class="form-busca">
                            <input type="text" name="nome" placeholder="Digite o nome do aluno..." required>
                            <button type="submit" name="buscar">Buscar</button>
                        </form>
                    </div>

                    <div id="container-cards">
                        <?php if (isset($_POST['buscar'])): ?>
                            <?php if (count($resultados) > 0): ?>
                                <?php foreach ($resultados as $aluno): ?>

                                    <div class="card-aluno" onclick="abrirModal(<?= htmlspecialchars(json_encode($aluno)) ?>)">
                                        <div class="card-header">
                                            <span class="matricula">#<?= $aluno['matricula'] ?></span>
                                            <h3><?= $aluno['nome'] ?></h3>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Curso:</strong> <?= $aluno['curso'] ?></p>
                                            <p><strong>E-mail:</strong> <?= $aluno['email'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="aviso">Nenhum aluno encontrado para "<?= htmlspecialchars($nome_busca) ?>".</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </section>
            </main>
            <div id="modalEdicao" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Ficha do Aluno</h2>
                        <span class="close" onclick="fecharModal()">&times;</span>
                    </div>

                    <div class="modal-body">
                        <p><strong>Nome:</strong> <span id="info-nome"></span></p>
                        <p><strong>Matrícula:</strong> <span id="info-matricula"></span></p>
                        <p><strong>Curso:</strong> <span id="info-curso"></span></p>
                        <p><strong>CPF:</strong> <span id="info-cpf"></span></p>
                        <p><strong>E-mail:</strong> <span id="info-email"></span></p>
                        <p><strong>Data de Nascimento:</strong> <span id="info-data"></span></p>
                    </div>

                    <div class="modal-footer">
                        <a href="#" id="btn-editar-pagina" class="btn-editar">Alterar Dados</a>
                        <button type="button" onclick="fecharModal()" class="btn-fechar">Fechar</button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <script src="../assets/js/update_modal.js"></script>

        <!-- Alerta de sucesso para atualização de cadastro -->
        <?php if (isset($_GET['atualizado'])): ?>
            <script>
                alert("✅ Cadastro atualizado com sucesso!");
                window.history.replaceState(null, null, window.location.pathname);
            </script>
        <?php endif; ?>

    </body>
    <script src="../assets/js/deny_acess.js"></script>

    </html>
<?php } ?>