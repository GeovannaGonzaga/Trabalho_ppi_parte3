<?php
include('../PHP/conexao.php');

$conexao = new Conexao();
$conn = $conexao->conexao;

$produto_id = isset($_GET['id']) ? $_GET['id'] : '';
$quantidade = isset($_GET['quantidade']) ? intval($_GET['quantidade']) : 1;

$detalhes_produto = obterDetalhesDoProdutoPorID($produto_id, $conn);

function obterDetalhesDoProdutoPorID($produto_id, $conn) {
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $produto_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $produto; 
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="comprar.css" rel="stylesheet">
    <title> Bios </title>
  </head>
  <body>

    <header>
        <nav class="navbar navbar-light navbar-container" id="navbar">  
        <div class="home"><a href="pagina_usuario.php"><img src="imagens/logo/2-removebg-preview.png" alt="logo"></a></div>
        <form class="d-flex form-container">
            <input class="form-control me-2" type="search" placeholder="Busque aqui o produto desejado" aria-label="Search" name="termo_pesquisa">
            <button class="btn btn-outline" type="submit">Pesquisar</button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header border-bottom border-3 border-primary">
                <a href="../login.php" style="text-decoration: none;">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"> 
                        <img src="https://img.icons8.com/pastel-glyph/35/127dbb/person-male--v2.png"/>
                            <?php
                            session_start();
                            if (isset($_SESSION['emailInput'])) {
                                echo "Olá, " . $_SESSION['emailInput'] . "!";  
                            } else {
                                echo "Sessão não encontrada. Faça login novamente.";
                            }
                            ?>
                    </h5>
                </a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
            </div>
            <br>
            <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item">

                <p class="Information">Serviços</p>
                <a class="nav-link active border-bottom border-top" href="produtos.php">
                    <p class="Options"><img src="https://img.icons8.com/pastel-glyph/25/127dbb/shopping-bag--v3.png"> Produtos</p>
                </a>
                <br>

                <p class="Information">Sobre o app</p>
                    <a class="nav-link active border-bottom border-top" aria-current="page" href="Sobre.php">
                        <p class="Options"><img src="https://img.icons8.com/ios/25/127dbb/alarm.png"> Sobre Nós</p>
                    </a>
                    <a class="nav-link active border-bottom border-top" aria-current="page" href="#">
                        <p class="Options"><img src="https://img.icons8.com/ios/22/127dbb/settings.png"> Configurações</p>
                    </a>
                <br>

                <p class="Information">Central de atendimento</p>
                <a class="nav-link active border-bottom border-top" href="fale.php">
                    <p class="Options"><img src="https://img.icons8.com/ios/24/127dbb/speech-bubble-with-dots.png"> Fale Conosco</p>
                </a>
                <br>
                
                <p class="Information">Sair</p>
                <a class="nav-link active border-bottom border-top" href="../index.html">
                    <p class="Options"><img src="https://img.icons8.com/ios/19/127dbb/exit--v1.png"/> Sair</p>
                </a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
    
    <main class="container">
        <h1 class="mt-3">Detalhes do Produto</h1>

        <div class="produto-container mt-4">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <?php
                    echo '<img src="data:image/png;base64,' . base64_encode($detalhes_produto['imagem']) . '" class="card-image img-fluid rounded" alt="' . $detalhes_produto["nome_produto"] . '">';
                    ?>
                </div>

                <div class="col-md-8 col-sm-12">
                    <?php
                    if (!empty($detalhes_produto)) {
                        echo '<h2>' . $detalhes_produto['nome_produto'] . '</h2>';
                        echo '<p class="description"><strong>Descrição:</strong> ' . $detalhes_produto['categoria'] . '</p>';
                        echo '<p class="price">Preço: <strong> R$ ' . number_format($detalhes_produto['preco'], 2, ',', '.') . '</strong></p>';
                    } else {
                        echo '<p>Produto não encontrado.</p>';
                    }
                    ?>
                    <div class="d-flex fixar-no-fim " class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mt-3">
                    <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary decrement" type="button" data-product-id="<?php echo $produto_id; ?>">-</button>
                                </div>
                                <input type="text" class="form-control quantity" value="<?php echo $quantidade; ?>" name="quantidade" data-product-id="<?php echo $produto_id; ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary increment" type="button" data-product-id="<?php echo $produto_id; ?>">+</button>
                                </div>
                            </div>
                      
                            <a class="btn btn-primary btn-comprar" href="../pagamento.php?id=<?php echo $produto_id; ?>&quantidade=<?php echo $quantidade; ?>" class="btn-comprar" data-product-id="<?php echo $produto_id; ?>">Comprar</a>
                    </div>
                </div>
            </div>
    
                </div>
            </div>


              <div class="mt-4 " class="col-md-4 col-sm-12">
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
      
    </main>

    <footer class="container-fluid">
        <img src="imagens/logo/2-removebg-preview.png" alt="logo">
        <p>Para entrar em contato, envie um email para: <a href="contato@example.com">contato@example.com</a></p>
        <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
    </footer>

    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Validations/produtos.js"></script>

  </body>
</html>