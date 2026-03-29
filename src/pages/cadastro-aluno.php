<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/src/styles/cadastro-aluno.css">
    <title>Cadastro do Usuário</title>
</head>
<body>
    
    <main class="container">
        <header class="cabecalho">
            <h1>Cadastro de Alunos</h1>
            <p>Adicione um novo aluno ao sistema</p>
        </header>

        <section class="secao-principal">
            <h2>Dados do Aluno</h2>
            <p>Preencha todos os campos para cadastrar um novo aluno</p>

            <form action="#" method="POST">

                <div class="nome">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="matricula">
                    <label for="matricula">Matrícula *</label>
                    <input type="text" id="matricula" name="matricula" required>
                </div>
                <div class="telefone">
                    <label for="telefone">Telefone *</label>
                    <input type="number" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                </div>
                <div class="curso">
                    <label for="curso">Curso *</label>
                    <input type="text" id="curso" name="curso" required>
                </div>
                <div class="cpf">
                    <label for="cpf">CPF *</label>
                    <input type="number" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
                <div class="email">
                    <label for="email">Email *</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="data">
                    <label for="data">Data de Nascimento *</label>
                    <input type="date" id="data" name="data" required> 
                </div>

                <div class="acoes">
                    <button type="enviar" class="btn-cadastro">Cadastrar Aluno</button>
                    <button type="button" class="btn-cancelar">Cancelar</button>
                </div>

            </form>
        </section>
    </main>

</body>
</html>