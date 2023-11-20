<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="cadastro.css" rel="stylesheet">
    <title>Bios</title>
  </head>
  <body>
      <div class ="home"><a href="User/produtos.php"> <img src="imagens/logo/1-removebg-preview.png" alt="logo"></a></div> 
      <div class="cadastro"> <p>Forma de Pagamento</p>
      <p>
        <?php
                              session_start();
                              echo "Escolha a forma de pagamento, " . $_SESSION['emailInput'] . "!";               
        ?>
      </p>
    </div>

      <form action="pagamento.php" method="post">
        <div class="telacadastro">
          <div>
            <p>Crédito ou Débito</p>
            <select class="form-select" id="tipoCartao" name="tipo_cartao" aria-label="Default select example" onchange="mostrarParcelas()">
              <option selected>Selecione</option>
              <option value="1">Débito</option>
              <option value="2">Crédito</option>
            </select>
          </div><br>


          <div class="row mb-3">
            <p>Número do Cartão</p>
            <div class="col-sm-12 form-floating">
              <input type="text" class="form-control" id="numeroCartao" name="numero_cartao" placeholder="Número do Cartão">
              <label for="numeroCartao">Número</label>
            </div>
          </div>

          <div class="row mb-3">
            <p>Nome do Titular</p>
            <div class="col-sm-12 form-floating">
              <input type="text" class="form-control" id="nomeTitular" name="nome_titular" placeholder="Nome do Titular">
              <label for="nomeTitular">Nome</label>
            </div>
          </div>

          <div class="row mb-3">
            <p>Validade do Cartão</p>
            <div class="col-sm-12 form-floating">
              <input type="text" class="form-control" id="validadeCartao" name="validade_cartao"  placeholder="Data de Validade">
              <label for="validadeCartao">Data da Validade</label>
            </div>
          </div>

          <div class="row mb-3">
            <p>Código de Segurança</p>
            <div class="col-sm-12 form-floating">
              <input type="text" class="form-control" id="codigoSeguranca" name="codigo_seguranca" placeholder="Código de Segurança">
              <label for="codigoSeguranca">3 dígitos</label>
            </div>
          </div>

          <div class="row mb-3" id="opcaoParcelas" style="display: none;">
            <p>Parcelas</p>
            <div class="col-sm-12 form-floating">
              <select class="form-select" id="numeroParcelas" name="numero_parcelas">
                <option value="1">1 vez sem juros</option>
                <option value="2">2 vezes sem juros</option>
                <option value="3">3 vezes sem juros</option>
              </select>
            </div>
          </div>
          <?php
            include('PHP/conexao.php');

            function obterDetalhesProdutoPorID($produto_id, $valor_produto, $quantidade_produto, $conn) {
                $query = "SELECT * FROM produtos WHERE id = :id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':id', $produto_id, PDO::PARAM_INT);
                $stmt->execute();

                $produto = $stmt->fetch(PDO::FETCH_ASSOC);

                return $produto; // retorna o resultado
            }

            try {
                $conexao = new Conexao();
                $conn = $conexao->conexao;

                $tipo_cartao = isset($_POST['tipo_cartao']) ? $_POST['tipo_cartao'] : null;
                $numero_cartao = isset($_POST['numero_cartao']) ? $_POST['numero_cartao'] : null;
                $nome_titular = isset($_POST['nome_titular']) ? $_POST['nome_titular'] : null;
                $validade_cartao = isset($_POST['validade_cartao']) ? $_POST['validade_cartao'] : null;
                $codigo_seguranca = isset($_POST['codigo_seguranca']) ? $_POST['codigo_seguranca'] : null;
                $numero_parcelas = isset($_POST['numero_parcelas']) ? $_POST['numero_parcelas'] : null;

                $produto_id = isset($_GET['id']) ? $_GET['id'] : null;
                $valor_produto = isset($_GET['preco']) ? $_GET['preco'] : null;
                $quantidade_produto = isset($_GET['quantidade']) ? $_GET['quantidade'] : null;

                $detalhes_produto = obterDetalhesProdutoPorID($produto_id, $valor_produto, $quantidade_produto, $conn);

                if ($tipo_cartao == 1) {
                    // Débito
                    $valor_final = $valor_produto * $quantidade_produto; 
                } else {
                    if ($numero_parcelas == 1) {
                        $valor_final = $valor_produto * $quantidade_produto; 
                    }
                    if ($numero_parcelas == 2) {
                        $valor_final = ($valor_produto * $quantidade_produto) * 1.1; // 10% de acréscimo 
                    } 
                    if ($numero_parcelas == 3) {
                        $valor_final = ($valor_produto * $quantidade_produto) * 1.2; // 20% de acréscimo 
                    }
                }

                // Verifique se o tipo_cartao não é nulo antes de executar a inserção
                if ($tipo_cartao !== null) {
                    $query = "INSERT INTO pagamento (tipo_cartao, numero_cartao, nome_titular, validade_cartao, codigo_seguranca, numero_parcelas) VALUES (:tipo_cartao, :numero_cartao, :nome_titular, :validade_cartao, :codigo_seguranca, :numero_parcelas)";
                    $stmt = $conn->prepare($query);

                    $stmt->bindParam(':tipo_cartao', $tipo_cartao, PDO::PARAM_INT);
                    $stmt->bindParam(':numero_cartao', $numero_cartao, PDO::PARAM_STR);
                    $stmt->bindParam(':nome_titular', $nome_titular, PDO::PARAM_STR);
                    $stmt->bindParam(':validade_cartao', $validade_cartao, PDO::PARAM_STR);
                    $stmt->bindParam(':codigo_seguranca', $codigo_seguranca, PDO::PARAM_STR);
                    $stmt->bindParam(':numero_parcelas', $numero_parcelas, PDO::PARAM_INT);

                    $stmt->execute();

                  
                }
            } catch (PDOException $e) {
                echo "Erro de conexão com o banco de dados: " . $e->getMessage();
            }
            ?>

            <div class="col-auto">
                <a class="btn btn-primary btn-comprar" href="User/pedido.php?id=<?php echo $produto_id; ?>&quantidade=<?php echo $quantidade_produto; ?>" class="btn-comprar" data-product-id="<?php echo $produto_id; ?>">Comprar</a>
            </div>

    </form><br>

    <footer><hr class="container"><p class="text-center">©2023 todos direitos reservados | Esse template foi feito por Bios</p><br></footer>

    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

  </body>
</html>