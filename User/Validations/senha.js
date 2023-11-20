function validarSenha(inputElement) {
  const senha = inputElement.value.trim();
  const regexSenha = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  let isValid = true;

  if (!regexSenha.test(senha)) {
      isValid = false;
      inputElement.classList.add("invalid");
      if (document.getElementById("passwordError").innerText === "") {
          document.getElementById("passwordError").innerText = "A senha deve conter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais (Exemplo: @$!%*?&)";
      }
  } else {
      inputElement.classList.remove("invalid");
      document.getElementById("passwordError").innerText = "";
  }

  return isValid;
}
