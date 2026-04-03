// Função para evitar que a pessoa consiga retornar à página anterior através da seta do navegador.
// Trabalha em conjunto com PHP na exclusão dos cookies da sessão.

window.onpageshow = function (event) {
    if (event.persisted) {

        window.location.reload();
    }
};
