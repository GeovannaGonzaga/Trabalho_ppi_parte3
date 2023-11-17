<?php
include('../PHP/conexao.php');

if (isset($_GET['id'])) {
    $conexao = new Conexao();
    $conn = $conexao->conexao;

    $id_produto = $_GET['id'];

    // Buscar as informações do produto com base no ID
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar se o produto foi encontrado
    if (!$produto) {
        echo "Produto não encontrado.";
        exit();
    }
} else {
    echo "ID do produto não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="cadastro.css" rel="stylesheet">
    <title>Editar Produto - Bios</title>
</head>
<body>
    <header>
        <div class="home">
            <a href="produtos"><img src="imagens/logo/1-removebg-preview.png" alt="logo"></a>
        </div>
    </header>
    <main>
        <div class="cadastro">
            <p><img src="https://img.icons8.com/small/40/127dbb/add-user-male.png">Editar Produto</p>
        </div>
        <div class="telacadastro">
            <form action="atualizar_produto.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Nome do Produto" value="<?php echo $produto['nome_produto']; ?>">
                        <label for="nome_produto">Nome do Produto:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço" value="<?php echo $produto['preco']; ?>">
                        <label for="preco">Preço:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" value="<?php echo $produto['categoria']; ?>">
                        <label for="categoria">Categoria:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="file" class="form-control" id="imagem" name="imagem">
                        <label for="imagem">Imagem:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer class="container-fluid"><br>
        <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
    </footer>

    <script src="script.js"></script>
    <script src="Validations/Submit.js"></script>
    <script src="Validations/nome.js"></script> 
    <script src="Validations/telefone.js"></script>
    <script src="Validations/Validar_Entrada.js"></script> 
    <script src="Validations/cpf.js"></script>
    <script src="Validations/email.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
