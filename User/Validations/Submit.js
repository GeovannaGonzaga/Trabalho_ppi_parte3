document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('cadastro-form');

    form.addEventListener('submit', function(event) {
      if (!camposPreenchidos()) {
        event.preventDefault(); // Impede o envio do formulário se campos não estiverem preenchidos
        alert('Por favor, preencha todos os campos.');
      }
    });

    function camposPreenchidos() {
      const nome = document.getElementById('nomeInput').value;
      const cpf = document.getElementById('cpfInput').value;
      const nascimento = document.getElementById('nascimentoInput').value;
      const telefone = document.getElementById('telefoneInput').value;
      const email = document.getElementById('emailInput').value;
      const senha = document.getElementById('passwordInput').value;
      const tipoCadastro = document.getElementById("tipoCadastro").value;

      if (tipoCadastro === "Selecione") {
        alert("Por favor, selecione um tipo de cadastro.");
        event.preventDefault(); // Isso impede o envio do formulário se a validação falhar
      }

      // Verifique se os campos obrigatórios foram preenchidos
      return nome && cpf && nascimento && telefone && email && senha;
    }
  });