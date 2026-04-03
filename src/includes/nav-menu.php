<link rel="stylesheet" href="../styles/nav-menu.css">
<div class="nav-menu">
    <div class="logo-area">
        <img src="../assets/img/logo.png" alt="Logo" class="sidebar-logo">
    </div>

    <nav class="nav-links">
        <a href="../pages/consulta_aluno.php" class="nav-button">
            <span class="icon">🔍</span> Consultar Cadastro
        </a>
        <a href="cadastrar.php" class="nav-button">
            <span class="icon">📝</span> Cadastrar Aluno
        </a>
        <a href="excluir.php" class="nav-button">
            <span class="icon">🗑️</span> Excluir Cadastro
        </a>
        <a href="sobre.php" class="nav-button">
            <span class="icon">ℹ️</span> Sobre
        </a>
        <a href="../pages/gerar_dados.php" class="nav-button">
            <span class="icon">ℹ️</span> Gerar Seed
        </a>
    </nav>

    <div class="logout-area">
        <form method="POST" action="">
            <button type="submit" name="logout" class="nav-button logout">
                <span class="icon">↪️</span> Logout
            </button>
        </form>
    </div>
</div>