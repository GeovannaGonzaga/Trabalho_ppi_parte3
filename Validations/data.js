//----------------------------------Validação do campo -----------------------------------------//

function validarDataNascimento(inputElement) {
    const inputValue = inputElement.value.trim();
  
    let isValid = true;
  
    if (inputValue === "") {
      isValid = false;
      inputElement.classList.add("invalid");
      if (document.getElementById("DataError").innerText === "") {
        document.getElementById("DataError").innerText = "Preencha o campo com uma senha valida.";
      }
    } else {
      input.classList.remove("invalid");
      document.getElementById("DataError").innerText = "";
    }
  
    return isValid;
  }
  