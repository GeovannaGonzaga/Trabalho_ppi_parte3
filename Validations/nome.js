//----------------------------------Validação do campo Nome-----------------------------------------//

function ValidarNome(inputElement) {
    const inputValue = inputElement.value.trim();
  
    let isValid = true;
  
    if (inputValue === "") {
      isValid = false;
      inputElement.classList.add("invalid");
      if (document.getElementById("NomeError").innerText === "") {
        document.getElementById("NomeError").innerText = "Campo Obrigatório";
      }
    } else {
      input.classList.remove("invalid");
      document.getElementById("NomeError").innerText = "";
    }
  
    return isValid;
  }
  