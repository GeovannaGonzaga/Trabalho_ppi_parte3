<?php
include('../PHP/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexao = new Conexao();
    $conn = $conexao->conexao;

    $id_produto = $_POST['id'];
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    // Verificar se uma nova imagem foi enviada
    if ($_FILES['imagem']['size'] > 0) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    } else {
        // Se não houver uma nova imagem, manter a imagem existente no banco de dados
        $query_select_imagem = "SELECT imagem FROM produtos WHERE id = :id";
        $stmt_select_imagem = $conn->prepare($query_select_imagem);
        $stmt_select_imagem->bindParam(':id', $id_produto, PDO::PARAM_INT);
        $stmt_select_imagem->execute();
        $imagem_existente = $stmt_select_imagem->fetchColumn();

        $imagem = $imagem_existente;
    }

    try {
        // Atualizar as informações do produto no banco de dados
        $query = "UPDATE produtos SET nome_produto = :nome_produto, preco = :preco, categoria = :categoria, imagem = :imagem WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
        $stmt->bindParam(':nome_produto', $nome_produto, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $imagem, PDO::PARAM_LOB);
        $stmt->execute();

        // Redireciona de volta para a página de administração de produtos após a atualização
        header("Location: produtos_admin.php");
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
    exit();
}
