function checkLogin(event) {
  event.preventDefault(); // Evita que o formulário seja enviado por padrão

  // Pega os valores de usuário e senha
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Verifica se o usuário e a senha são 'admin'
  if (username.toLowerCase() === 'admin' && password.toLowerCase() === 'admin' ) {
    // Se for 'admin', redireciona para a página admin_control.html
    window.location.href = 'admin_control.html';
  } else if(username.toLowerCase() === 'juliac@gmail.com' && password.toLowerCase() === '12345'){
    window.location.href = 'pagina_usuario.html';
  }else {
    alert('Usuário ou senha incorretos. Tente novamente.');
  }
}
// validation
document.addEventListener("DOMContentLoaded", function() {
  const emailInput = document.querySelector("#emailInput");
  const telefoneInput = document.querySelector("#telefoneInput");
  const cpfInput = document.querySelector("#cpfInput");
  const form = document.querySelector("#cadastro-form");

  form.addEventListener("submit", function(event) {
    let isValid = true;

    if (emailInput.value.indexOf('@') === -1) {
      alert("O email precisa conter um '@'.");
      isValid = false;
    }

    if (telefoneInput.value.length < 5) {
      alert("O número de telefone precisa ter pelo menos 5 dígitos.");
      isValid = false;
    }

    if (cpfInput.value.length < 5) {
      alert("O CPF precisa ter pelo menos 5 dígitos.");
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
});

// uploadImage

function handleImageUpload() {
const imageInput = document.getElementById("imageInput");
const imagePreview = document.getElementById("imagePreview");

imageInput.addEventListener("change", function () {
  const file = imageInput.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = new Image();
      img.src = e.target.result;
      img.style.maxWidth = "100%";
      imagePreview.innerHTML = ""; // Limpar qualquer imagem anterior
      imagePreview.appendChild(img);
    };
    reader.readAsDataURL(file);
  }
});

// Impedir o envio do formulário e a mudança de página ao clicar no link "Todos os produtos"
const todosOsProdutosLink = document.getElementById("todosOsProdutosLink");
todosOsProdutosLink.addEventListener("click", function (event) {
  event.preventDefault();
});
}

document.addEventListener("DOMContentLoaded", function () {
var floatingIcon = document.getElementById("floating-icon");
var contactForm = document.getElementById("contact-form");

// Quando o ícone é clicado, mostre o formulário
floatingIcon.addEventListener("click", function () {
  contactForm.style.display = "block";
});

// Quando o botão de fechar no formulário é clicado, oculte o formulário
document.getElementById("close-form").addEventListener("click", function () {
  contactForm.style.display = "none";
});
});



        function validarFormulario() {
          var creditoDebito = document.forms["formulario"]["creditoDebito"].value;
          var numeroCartao = document.forms["formulario"]["numeroCartao"].value;
          var nomeTitular = document.forms["formulario"]["nomeTitular"].value;
          var validadeCartao = document.forms["formulario"]["validadeCartao"].value;
          var codigoSeguranca = document.forms["formulario"]["codigoSeguranca"].value;
  
          if (numeroCartao.length !== 16) {
            alert("O número do cartão deve ter 16 dígitos.");
            return;
          }
          if (nomeTitular.trim() === "") {
            alert("O campo Nome do Titular não pode estar vazio.");
            return;
          }
          if (!/^\d\d\/\d\d$/.test(validadeCartao)) {
            alert("A validade do cartão deve estar no formato MM/AA.");
            return;
          }
          if (!/^\d{3}$/.test(codigoSeguranca)) {
            alert("O código de segurança deve ter 3 dígitos.");
            return;
          }
  
          // Se todos os campos estiverem corretos, o formulário pode ser enviado
          document.getElementById("formulario").submit();
        }