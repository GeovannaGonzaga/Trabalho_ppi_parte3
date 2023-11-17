<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Produto = $_POST['Produto'];
    $Preco = $_POST['Preco'];
    $Categoria = $_POST['Categoria'];

    // Processar o arquivo de imagem
    $imagem = $_FILES['imagem']['tmp_name']; // Caminho temporário do arquivo
    $tipo = $_FILES['imagem']['type']; // Tipo do arquivo

    if ($tipo == 'image/png' && file_exists($imagem) && is_readable($imagem) && filesize($imagem) > 0) {
        $conteudo_imagem = file_get_contents($imagem);

        $conexao = new Conexao();

        $query = "INSERT INTO produtos (nome_produto, preco, categoria, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->conexao->prepare($query);

        try {
            $stmt->bindParam(1, $Produto);
            $stmt->bindParam(2, $Preco);
            $stmt->bindParam(3, $Categoria);
            $stmt->bindParam(4, $conteudo_imagem, PDO::PARAM_LOB); // Usar PDO::PARAM_LOB para dados binários

            $stmt->execute();

            // Redirecionamento antes de qualquer saída
            header("Location: ../Administrador/cadastro_produto.php");
            exit();
        } catch (PDOException $e) {
            // Em caso de erro, redirecionar com mensagem de erro
            header("Location: ../Administrador/cadastro_produto.php?erro=1");
            exit();
        } finally {
            $conexao->fecharConexao();
        }
    } else {
        // Em caso de imagem inválida, redirecionar com mensagem de erro
        header("Location: ../Administrador/cadastro_produto.php?erro=1");
        exit();
    }
}
?>
