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
require("../includes/acess_db.php");

if (isset($_POST['logout'])) {
    logout();
    header("Location: ../../index.php");
}

if (isset($_POST['confirmar_exclusao'])) {
    $matricula_excluir = $_POST['matricula_excluir'];
    $query_delete = "DELETE FROM alunos WHERE matricula = :matricula_excluir";
    
    if ($connection) {
        $stmt = $connection->prepare($query_delete);
        $stmt->execute([
            ':matricula_excluir' => $matricula_excluir
        ]);
        header("Location: excluir_registro.php?excluido=1");
        exit();
    }
}

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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/excluir_registro.css">
    <title>Excluir Cadastro</title>
</head>

<body>
    <main>
        <section id="nav-menu">
            <?php include("../includes/nav-menu.php"); ?>
        </section>

        <section id="conteudo">
            <div class="header-busca">
                <h1>Excluir Cadastro de Aluno</h1>
                <form action="excluir_registro.php" method="POST" class="form-busca">
                    <input type="text" name="nome" placeholder="Digite o nome do aluno para excluir..." required>
                    <button type="submit" name="buscar">Buscar</button>
                </form>
            </div>

            <div id="container-cards">
                <?php if (isset($_POST['buscar'])): ?>
                    <?php if (count($resultados) > 0): ?>
                        <?php foreach ($resultados as $aluno): ?>
                            <div class="card-aluno" onclick="abrirModalExclusao(<?= htmlspecialchars(json_encode($aluno)) ?>)">
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

    <div id="modalExclusao" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ficha do Aluno</h2>
                <span class="close" onclick="fecharModalExclusao()">&times;</span>
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
                <button type="button" onclick="abrirConfirmacao()" class="btn-excluir">Excluir registro</button>
                <button type="button" onclick="fecharModalExclusao()" class="btn-fechar">Fechar</button>
            </div>
        </div>
    </div>
    <div id="modalConfirmacao" class="modal">
        <div class="modal-content confirmacao-content">
            <div class="modal-header">
                <h2 style="color: #ff4757;">Atenção!</h2>
            </div>
            <div class="modal-body">
                <p style="text-align: center; font-size: 1.1rem; justify-content: center; border: none;">
                    Tem certeza que deseja excluir o cadastro deste aluno?<br>Esta ação não poderá ser desfeita.
                </p>
            </div>
            <form method="POST" action="excluir_registro.php">
                <input type="hidden" id="input-matricula-excluir" name="matricula_excluir" value="">
                <div class="modal-footer">
                    <button type="submit" name="confirmar_exclusao" class="btn-excluir">Sim, excluir</button>
                    <button type="button" onclick="fecharConfirmacao()" class="btn-fechar">Não, cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/delete_modal.js"></script>

    <!-- Alerta de sucesso para exclusão -->
    <?php if (isset($_GET['excluido'])): ?>
        <script>
            alert("🗑️ Cadastro excluído com sucesso!");
            window.history.replaceState(null, null, window.location.pathname);
        </script>
    <?php endif; ?>

    <script src="../assets/js/deny_acess.js"></script>
</body>
</html>