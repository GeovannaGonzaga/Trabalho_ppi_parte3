<?php
include('../PHP/conexao.php');

$conexao = new Conexao();
$conn = $conexao->conexao;

$query = "SELECT * FROM produtos";
$stmt = $conn->prepare($query);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conexao->fecharConexao();

// Verifica se há um termo de pesquisa na URL
$termo_pesquisa = isset($_GET['termo_pesquisa']) ? $_GET['termo_pesquisa'] : '';

// Modifica a consulta SQL para incluir a cláusula WHERE com base no termo de pesquisa
$query = "SELECT * FROM produtos";
if (!empty($termo_pesquisa)) {
    $query .= " WHERE nome_produto LIKE :termo_pesquisa";
}

// Prepara e executa a consulta SQL
$stmt = $conn->prepare($query);

if (!empty($termo_pesquisa)) {
    $termo_pesquisa = "%$termo_pesquisa%";
    $stmt->bindParam(':termo_pesquisa', $termo_pesquisa, PDO::PARAM_STR);
}

$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="produtos.css" rel="stylesheet">
    <link href="nav.css" rel="stylesheet">
    <title>Bios</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-light navbar-container" id="navbar">
        <div class="home">
          <a href="produtos_admin.php">
            <img src="imagens/logo/2-removebg-preview.png" alt="logo">
          </a>
        </div>
        <form class="d-flex form-container">
          <input class="form-control me-2" type="search" placeholder="busque aqui o produto desejado" aria-label="Search" name="termo_pesquisa">
          <button class="btn btn-outline" type="submit">search</button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header border-bottom border-3 border-primary">
            <a href="login.html" style="text-decoration: none;">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                <img src="https://img.icons8.com/pastel-glyph/40/127dbb/person-male--v2.png"/> 
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
            
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <br>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item">
                    <p class="Information">Serviços</p>
                    <a class="nav-link active border-bottom border-top" aria-current="cadastrar_produto.php" href="cadastro_produto.php">
                        <p class="Options"><img src="https://img.icons8.com/pastel-glyph/25/127dbb/shopping-bag--v3.png"/> Cadastrar um produto</p>
                    </a>
                    <a class="nav-link active border-bottom border-top" aria-current="cadastrar_produto.php" href="lista_usuario.php">
                          <p class="Options"><img src="https://img.icons8.com/ios/22/127dbb/settings.png"/> Listar Usuários</p>
                    </a>

                    <br><p class="Information">Sobre o app</p>

                    <a class="nav-link active border-bottom border-top" aria-current="page" href="Sobre.php">
                      <p class="Options"><img src="https://img.icons8.com/ios/25/127dbb/alarm.png"> Sobre Nós</p>
                    </a>

                    <br><p class="Information">Sair</p>

                    <a class="nav-link active border-bottom border-top" aria-current="page" href="index.html">
                      <p class="Options"><img src="https://img.icons8.com/ios/19/127dbb/exit--v1.png"/> Sair</p>
                    </a>
                </li>
          </div>
      </nav>
    </header> 
    
    <main>
      <p class="title-products">Produtos</p>
      <section id="conteudo">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="row">
                    <?php
                      foreach ($produtos as $produto) {
                        echo '<div class="col col-md-3">
                                    <div class="card"> 
                                        <img src="data:image/png;base64,' . base64_encode($produto['imagem']) . '" class="card-image" alt="' . $produto["nome_produto"] . '">
                                        <div class="card-body">
                                            <p class="card-text value"><strong>R$ ' . number_format($produto["preco"], 2, ',', '.') . '</strong></p>
                                            <p class="card-text">' . $produto["nome_produto"] . '</p>
                                            <div class="d-flex">
                                                <button class="btn btn-primary edit-button">Editar</button>
                                                <button class="btn btn-danger delete-button">Excluir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                     }
                    ?>
                </div>
            </div>
        </div>
      </section>
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
