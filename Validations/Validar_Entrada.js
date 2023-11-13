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