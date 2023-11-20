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

function inserirPedido($produto_id, $quantidade, $conn) {
    // Recupere os detalhes do produto
    $detalhes_produto = obterDetalhesDoProdutoPorID($produto_id, $conn);

    // Dados do cliente
    session_start();
    $email_cliente = isset($_SESSION['emailInput']) ? $_SESSION['emailInput'] : '';

    // Calcular o preço total
    $preco_total = $detalhes_produto['preco'] * $quantidade;

    // Inserir o pedido na tabela 'pedidos'
    $query = "INSERT INTO pedidos (id_produto , email_cliente, quantidade, preco_total)
              VALUES (:id_produto, :email_cliente, :quantidade, :preco_total)";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_produto', $produto_id, PDO::PARAM_INT);
    $stmt->bindParam(':email_cliente', $email_cliente, PDO::PARAM_STR);
    $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
    $stmt->bindParam(':preco_total', $preco_total, PDO::PARAM_STR);

    $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['quantidade'])) {
    inserirPedido($produto_id, $quantidade, $conn);
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
                        
                        // Calcular o preço total
                        $preco_total = $detalhes_produto['preco'] * $quantidade;
                        echo '<p class="price"><strong>Preço total:</strong> R$ ' . number_format($preco_total, 2, ',', '.') . '</p>';
                    } else {
                        echo '<p>Produto não encontrado.</p>';
                    }
                    ?>
                </div>

                <div class="col-md-12 fixar-no-fim finalizar ">
                <a class="btn btn-primary" href="../User/produtos.php?id=<?php echo $produto_id; ?>&quantidade=<?php echo $quantidade; ?>" class="btn-comprar" data-product-id="<?php echo $produto_id; ?>">Finalizar</a>
            </div>
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