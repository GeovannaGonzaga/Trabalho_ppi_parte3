$(document).ready(function() {
    $('#tabelaUsuarios').DataTable({
        searching: true,
        ordering: true,
        paging: true, // Desabilita a paginação
        info: true // Desabilita a exibição de informações
    });

    $('#limparTabela').click(function() {
        var tabela = $('#tabelaUsuarios').DataTable();
        tabela.clear().draw();
    });
});
