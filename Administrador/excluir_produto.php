<?php
include('../PHP/conexao.php');

if (isset($_GET['id'])) {
    $conexao = new Conexao();
    $conn = $conexao->conexao;

    $id_produto = $_GET['id'];

    try {
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona de volta para a página de administração de produtos após excluir
        header("Location: produtos_admin.php");
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
