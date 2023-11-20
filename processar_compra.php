<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do formulário
    $id_produto = $_POST['id_produto'];
    $preco = $_POST['preco'];

    // Adicione sua lógica de processamento da compra aqui
    // ...

    // Redirecione o usuário para uma página de confirmação ou outra após a compra
    header('Location: confirmacao_compra.php');
    exit;
} else {
    // Se o formulário não foi enviado corretamente, redirecione para a página de erro
    header('Location: erro.php');
    exit;
}
?>
