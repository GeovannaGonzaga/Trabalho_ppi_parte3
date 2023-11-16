<?php
include('../PHP/conexao.php');

$conexao = new Conexao();

// Recupera o ID do usuário da URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Consulta o banco de dados para obter os dados do usuário pelo ID
    $query = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conexao->conexao->prepare($query);
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo 'Usuário não encontrado.';
        exit();
    }

    // Exemplo de formulário de edição
    echo '<form method="POST" action="editar_usuario.php">
            <!-- Campos do formulário para edição -->
            <input type="hidden" name="id" value="' . $usuario['id'] . '">
            <input type="text" name="nomeInput" value="' . htmlspecialchars($usuario['nome']) . '">
            <!-- Adicione outros campos do formulário aqui -->
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
          </form>';
} else {
    echo 'ID do usuário não fornecido.';
}

$conexao->fecharConexao();
?>
