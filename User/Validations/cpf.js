//----------------------------------Validação do campo CPF-----------------------------------------//

function validarcpf(input) {
    let value = input.value.replace(/\D/g, "").slice(0, 11);
    let isValid = true;
    
    if (isNaN(value) || value.length !== 11) {
        isValid = false;
        input.classList.add("invalid");
  
        if (document.getElementById("CpfError").innerText === "") {
          document.getElementById("CpfError").innerText = "O CPF precisa ter pelo menos 11 dígitos.";
        }
      } else {
        input.classList.remove("invalid");
        document.getElementById("CpfError").innerText = "";
      }
    if (value.length === 11) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/,"$1.$2.$3-$4");
    }
    input.value = value;
    return isValid;
  }