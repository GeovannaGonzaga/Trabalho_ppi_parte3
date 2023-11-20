function validarFormulario() {
    let nomeValido = validarNome();
    let precoValido = validarPreco();
    let categoriaValida = validarCategoria();

    return nomeValido && precoValido && categoriaValida;
}

function validarNome() {
    let input = document.getElementById("Produto");
    let value = input.value.trim();

    if (value.length < 5) {
        exibirMensagemErro("NomeError", "O nome do produto precisa ter pelo menos 5 caracteres.");
        return false;
    }

    resetarMensagemErro("NomeError");
    return true;
}

function validarPreco() {
    let input = document.getElementById("Preco");
    let value = input.value.trim();

    if (!/^\d+(\.\d{1,2})?$/.test(value)) {
        exibirMensagemErro("PriceError", "O preço deve ser um número válido, com até duas casas decimais.");
        return false;
    }

    resetarMensagemErro("PriceError");
    return true;
}

function validarCategoria() {
    let input = document.getElementById("Categoria");
    let value = input.value.trim();

    if (value.length <= 2) {
        exibirMensagemErro("CategoriaError", "A categoria deve ter mais de duas letras.");
        return false;
    }

    resetarMensagemErro("CategoriaError");
    return true;
}

function exibirMensagemErro(id, mensagem) {
    let elementoErro = document.getElementById(id);
    elementoErro.innerText = mensagem;
    // Adicione estilos ou classes necessárias para destacar o erro se desejar
}

function resetarMensagemErro(id) {
    let elementoErro = document.getElementById(id);
    elementoErro.innerText = "";
    // Remova estilos ou classes relacionadas ao erro, se aplicável
}
