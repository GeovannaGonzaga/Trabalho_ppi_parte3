// const stars = document.querySelectorAll('.star');
          
// stars.forEach((star, index) => {
//     star.addEventListener('click', () => {
//         const starRating = star.getAttribute('data-star');
//         alert(`Você avaliou com ${starRating} estrelas.`);
//         // Adicione a classe 'filled' para mudar o ícone da estrela clicada
//         star.classList.add('filled');
//         star.src = "https://img.icons8.com/small/25/ffcb0c/filled-star.png";
//         // Adicione a classe 'filled' e altere o ícone para todas as estrelas anteriores
//         for (let i = 0; i < index; i++) {
//             stars[i].classList.add('filled');
//             stars[i].src = "https://img.icons8.com/small/25/ffcb0c/filled-star.png";
//         }
//     });
// });
              

var quantityInputs = document.querySelectorAll('.quantity');
var incrementButtons = document.querySelectorAll('.increment');
var decrementButtons = document.querySelectorAll('.decrement');

incrementButtons.forEach(function (button, index) {
    button.addEventListener('click', function () {
        var currentQuantity = parseInt(quantityInputs[index].value);
        quantityInputs[index].value = currentQuantity + 1;
    });
});

decrementButtons.forEach(function (button, index) {
    button.addEventListener('click', function () {
        var currentQuantity = parseInt(quantityInputs[index].value);
        if (currentQuantity > 1) {
            quantityInputs[index].value = currentQuantity - 1;
        }
    });
});        
    
