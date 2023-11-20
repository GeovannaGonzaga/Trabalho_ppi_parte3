//------------------------------Validação do campo Email---------------------------//
function validarEmail(input) {
    const email = input.value;
    const re = /\S+@\S+\.\S{2,}/; // expressão regular para validar formato de e-mail
    let isValid = true;
    if (!re.test(email)) {
      isValid = false;
      input.classList.add("invalid");
      if (document.getElementById("EmailError").innerText === "") {
        document.getElementById("EmailError").innerText = "Endereço de Email Inválido!";
      }
    } else {
      input.classList.remove("invalid");
      document.getElementById("EmailError").innerText = "";
    }
  
    return isValid;
  }