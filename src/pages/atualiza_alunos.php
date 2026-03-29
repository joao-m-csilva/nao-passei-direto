<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/about.css">
    <link rel="stylesheet" href="../styles/atualizar_alunos.css">
    <title>Atualiza dados de Alunos</title>
</head>
<body>
    <header>
        <h1>Atualizar os dados do Aluno</h1>
    </header>
    <section class="container">
            <form action="#" method="PUT" class="cls_formulario">

                <div class="div_input">
                    <label for="nome" class="lb_input">Nome Completo </label>
                    <input type="text" class="cls_input" id="nome" name="nome" required>
                </div>
                <div class="div_input">
                    <label for="matricula" class="lb_input">Matrícula </label>
                    <input type="text" class="cls_input" id="matricula" name="matricula" required>
                </div>
                <div class="div_input">
                    <label for="telefone" class="lb_input">Telefone </label>
                    <input type="number" class="cls_input" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                </div>
                <div class="div_input">
                    <label for="curso" class="lb_input">Curso </label>
                    <input type="text" class="cls_input" id="curso" name="curso" required>
                </div>
                <div class="div_input">
                    <label for="cpf" class="lb_input">CPF </label>
                    <input type="number" class="cls_input" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
                <div class="div_input">
                    <label for="email" class="lb_input">Email </label>
                    <input type="text" class="cls_input" id="email" name="email" required>
                </div>
                <div class="div_input">
                    <label for="data" class="lb_input">Data de Nascimento </label>
                    <input type="date" class="cls_input" id="data" name="data" required> 
                </div>

                <div class="div-btn-atualiza">
                    <button type="button" class="btn-atualiza">Atualizar Dados</button>
                </div>

            </form>
    </section>
    <footer></footer>
</body>
</html>