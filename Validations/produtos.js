document.addEventListener("DOMContentLoaded", function () {
    // Adiciona um ouvinte de evento para cada botão de decremento
    document.querySelectorAll(".decrement").forEach(function (button) {
        button.addEventListener("click", function () {
            updateQuantity(button, -1);
        });
    });

    // Adiciona um ouvinte de evento para cada botão de incremento
    document.querySelectorAll(".increment").forEach(function (button) {
        button.addEventListener("click", function () {
            updateQuantity(button, 1);
        });
    });
});

function updateQuantity(button, increment) {
    // Obtém o ID do produto e a quantidade atual
    var productId = button.getAttribute("data-product-id");
    var inputQuantity = document.querySelector('.quantity[data-product-id="' + productId + '"]');
    var currentQuantity = parseInt(inputQuantity.value);

    // Atualiza a quantidade com o incremento
    var newQuantity = currentQuantity + increment;

    // Certifica-se de que a quantidade não seja negativa
    newQuantity = Math.max(newQuantity, 0);

    // Atualiza o valor do campo de quantidade
    inputQuantity.value = newQuantity;
    
    // Atualiza o link de compra com a nova quantidade
    var buyLink = document.querySelector('.btn-comprar[data-product-id="' + productId + '"]');
    buyLink.href = 'comprar.php?id=' + productId + '&quantidade=' + newQuantity;
}