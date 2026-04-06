let matriculaAtual = null;

function abrirModalExclusao(aluno) {
    document.getElementById('modalExclusao').style.display = 'block';
    document.getElementById('info-nome').innerText = aluno.nome;
    document.getElementById('info-matricula').innerText = aluno.matricula;
    document.getElementById('info-curso').innerText = aluno.curso;
    document.getElementById('info-cpf').innerText = aluno.cpf;
    document.getElementById('info-email').innerText = aluno.email;
    document.getElementById('info-data').innerText = aluno.data_nasc;
    matriculaAtual = aluno.matricula;
}

function fecharModalExclusao() {
    document.getElementById('modalExclusao').style.display = 'none';
}

function abrirConfirmacao() {

    fecharModalExclusao();
    
    document.getElementById('modalConfirmacao').style.display = 'block';
    
    document.getElementById('input-matricula-excluir').value = matriculaAtual;
}

function fecharConfirmacao() {
    document.getElementById('modalConfirmacao').style.display = 'none';
}

window.onclick = function(event) {
    let modalExc = document.getElementById('modalExclusao');
    let modalConf = document.getElementById('modalConfirmacao');
    
    if (event.target == modalExc) fecharModalExclusao();
    if (event.target == modalConf) fecharConfirmacao();
}