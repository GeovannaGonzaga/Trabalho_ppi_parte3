<?php
include('../PHP/conexao.php');

$conexao = new Conexao();
$conn = $conexao->conexao;

// Certifique-se de obter o ID do produto da URL
$produto_id = isset($_GET['id']) ? $_GET['id'] : null;

// Adicione a lógica para buscar os detalhes do produto com base no ID
// Substitua isso com a lógica real do seu aplicativo
$detalhes_produto = obterDetalhesDoProdutoPorID($produto_id, $conn);

// Função fictícia para obter detalhes do produto por ID
function obterDetalhesDoProdutoPorID($produto_id, $conn) {
    // Consulta SQL para obter os detalhes do produto
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $produto_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Use fetch para obter apenas uma linha
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $produto; // Certifique-se de retornar o resultado
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="nav.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="compra_produto.css" rel="stylesheet">
    <title> Bios </title>
  </head>
  <body>
    
    <nav class="navbar navbar-light navbar-container" id="navbar">
      <div class="home"><a href="index.html"> <img src="imagens/logo/2-removebg-preview.png" alt="logo"></a></div>
      <form class="d-flex form-container">
          <input class="form-control me-2" type="search" placeholder="busque aqui o produto desejado" aria-label="Search">
          <button class="btn btn-outline" type="submit">search</button>
      </form>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header border-bottom border-3 border-primary">
            <a href="login.html" style="text-decoration: none;">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img src="https://img.icons8.com/pastel-glyph/40/127dbb/person-male--v2.png"/> Olá, faça seu login ou cadastre-se
                </h5>
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <br>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item">
                    <p class="Information">Serviços</p>
                    <a class="nav-link active border-bottom border-top" aria-current="page" href="produtos.html">
                      <p class="Options"><img src="https://img.icons8.com/pastel-glyph/25/127dbb/shopping-bag--v3.png"> Produtos</p>
                    </a>
                    <a class="nav-link active border-bottom border-top" aria-current="page" href="#">
                        <p class="Options"><img src="https://img.icons8.com/fluency-systems-regular/25/127dbb/buy--v1.png"/> Meu carrinho</p>
                    </a>

                    <br><p class="Information">Sobre o app</p>

                    <a class="nav-link active border-bottom border-top" aria-current="page" href="Sobre.html">
                      <p class="Options"><img src="https://img.icons8.com/ios/25/127dbb/alarm.png"> Sobre Nós</p>
                    </a>

                    <br><p class="Information">Central de atendimento</p>

                    <a class="nav-link active border-bottom border-top" aria-current="page" href="fale.html">
                      <p class="Options"><img src="https://img.icons8.com/ios/24/127dbb/speech-bubble-with-dots.png"> Fale Conosco</p>
                    </a>

                    <br><p class="Information">Sair</p>

                    <a class="nav-link active border-bottom border-top" aria-current="page" href="index.html">
                      <p class="Options"><img src="https://img.icons8.com/ios/19/127dbb/exit--v1.png"/> Sair</p>
                    </a>

                </li>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-3">Detalhes do Produto</h1>

        <div class="produto-container mt-4">
    <div class="row">
        <div class="col-md-4">
            <?php
            echo '<a href="data:image/png;base64,' . base64_encode($detalhes_produto['imagem']) . '" target="_blank">';
            echo '<img src="data:image/png;base64,' . base64_encode($detalhes_produto['imagem']) . '" class="card-image img-fluid rounded" alt="' . $detalhes_produto["nome_produto"] . '">';
            echo '</a>';
            ?>
        </div>

        <div class="col-md-8">
            <?php
            if (!empty($detalhes_produto)) {
                echo '<h3>' . $detalhes_produto['nome_produto'] . '</h3>';
                echo '<p>Preço: R$ ' . number_format($detalhes_produto['preco'], 2, ',', '.') . '</p>';
                echo '<p>Descrição: ' . $detalhes_produto['categoria'] . '</p>';
                // Adicione mais detalhes conforme necessário
            } else {
                echo '<p>Produto não encontrado.</p>';
            }
            ?>
            <div class="d-flex">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary decrement" type="button">-</button>
                    </div>
                    <input type="text" class="form-control quantity" value="1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary increment" type="button">+</button>
                    </div>
                </div>
                <a href="pagamento.html" class="btn btn-primary ml-2">Comprar</a>
            </div>
        </div>
    </div>
</div>


            <div class="mt-4">
                <h3>Avaliações</h3>
                <div class="alert alert-info">
                    <strong>Usuário 1:</strong> Ótimo produto! 5 estrelas.
                </div>
                <div class="alert alert-info">
                    <strong>Usuário 2:</strong> Produto de alta qualidade. 4 estrelas.
                </div>
                <!-- Adicione mais avaliações aqui -->
            </div>       
    </div>

      




    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Validations/produtos.js"></script>

  </body>
</html>