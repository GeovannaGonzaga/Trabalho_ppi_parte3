//------------------validação caracteres aceitos nos campos------------//

  function Acpted_Number(event) {
    const charCode = event.which ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      event.preventDefault();
    }
  }
  
  function Acpted_String(event) {
    const input = event.target;
    if (input.value.trim() === "") {
      input.classList.add("invalid");
    } else {
      input.classList.remove("invalid");
    }
  }
  
   function ValidaText(event) {
    const input = event.target;
     input.value = input.value.replace(/\d/g, "");
     if (input.value === "") {
       input.classList.add("invalid");
     } else {
       input.classList.remove("invalid");
     }
   }

  
   function ValidarPrice(inputElement) {
    const inputValue = inputElement.value.trim();
  
    let isValid = true;
  
    if (inputValue === "") {
      isValid = false;
      inputElement.classList.add("invalid");
      if (document.getElementById("PriceError").innerText === "") {
        document.getElementById("PriceError").innerText = "Campo Obrigatório";
      }
    } else {
      input.classList.remove("invalid");
      document.getElementById("PriceError").innerText = "";
    }
  
    return isValid;
  }

  function ValidarProduto(inputElement) {
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
  
  