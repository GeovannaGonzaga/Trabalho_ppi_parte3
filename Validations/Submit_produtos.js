document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('cadastro-form');
  
    form.addEventListener('submit', function(event) {
      if (!camposPreenchidos()) {
        event.preventDefault();
        alert('Por favor, preencha todos os campos.');
      } else {
        // Redireciona para a página desejada após o envio do formulário
        window.location.href = 'produtos_admin.html';
      }
    });
  
    function camposPreenchidos() {
      const produto = document.getElementById('Produto').value;
      const preco = document.getElementById('Preco').value;
      const categoria = document.getElementById('Categoria').value;
  
      return produto && preco && categoria;
    }
  });
  