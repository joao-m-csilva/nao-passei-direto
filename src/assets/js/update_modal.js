function abrirModal(aluno) {
    document.getElementById('modalEdicao').style.display = 'block';
    
    document.getElementById('info-nome').innerText = aluno.nome;
    document.getElementById('info-matricula').innerText = aluno.matricula;
    document.getElementById('info-curso').innerText = aluno.curso;
    document.getElementById('info-cpf').innerText = aluno.cpf;
    document.getElementById('info-email').innerText = aluno.email;
    document.getElementById('info-data').innerText = aluno.data_nasc;

    const btnEditar = document.getElementById('btn-editar-pagina');
    btnEditar.href = `atualiza_alunos.php?matricula=${aluno.matricula}`;
}

function fecharModal() {
    document.getElementById('modalEdicao').style.display = 'none';
}

window.onclick = function(event) {
    let modal = document.getElementById('modalEdicao');
    if (event.target == modal) fecharModal();
}