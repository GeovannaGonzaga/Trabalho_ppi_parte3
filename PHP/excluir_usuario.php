<?php
include('../PHP/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $conexao = new Conexao();

    // Preparando a consulta para obter os dados do usuário antes de excluir (opcional)
    $consulta = "SELECT * FROM usuarios WHERE id = ?";
    $stmtConsulta = $conexao->conexao->prepare($consulta);
    $stmtConsulta->execute([$id]);
    $usuarioExcluir = $stmtConsulta->fetch(PDO::FETCH_ASSOC);

    // Consulta SQL para excluir o usuário
    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexao->conexao->prepare($query);

    try {
        $stmt->execute([$id]);

        // Redireciona de volta à lista após a exclusão
        header("Location: ../Administrador/lista_usuario.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir usuário. Por favor, tente novamente.";
    }

    $conexao->fecharConexao();
} else {
    echo "ID do usuário não fornecido.";
}
?>
