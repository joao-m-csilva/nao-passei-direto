<link rel="stylesheet" href="../styles/nav-menu.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bitcount+Prop+Double:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


<div class="nav-menu">
    <div class="logo-area">
        <img src="../assets/img/logo.jpeg" alt="Logo" class="sidebar-logo">
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
            <span class="icon">💡</span> Sobre
        </a>
        <a href="../pages/gerar_dados.php" class="nav-button">
            <span class="icon">🌱</span> Gerar Seed
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