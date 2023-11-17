<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="cadastro.css" rel="stylesheet">
    <title>Bios</title>
  </head>
  <body>

    <header>
      <div class ="home"><a href="produtos_admin.php"> <img src="imagens/logo/1-removebg-preview.png" alt="logo"></a></div> 
    </header>

    <main>
      <div class="cadastro"> <p><img src="https://img.icons8.com/small/40/127dbb/add-user-male.png"> Cadastre seu produto</p></div>
      <div class="telacadastro">
        <form  id="cadastro-form" action="../PHP/processar_cadastro_produto.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                  <input type="text" class="form-control" id="Produto" name="Produto" placeholder="Nome Produto">
                  <label for="floatingInput">Nome do produto:</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                  <input type="text" class="form-control" id="Preco" name="Preco" placeholder="Preco">
                  <label for="floatingInput">Preço do Produto:</label>
                  <span id="PriceError" class="error-message"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                  <input type="text" class="form-control" id="Categoria" name="Categoria" placeholder="Categoria">
                  <label for="floatingInput">Categoria:</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                <input type="file" class="form-control" id="fileInput" name="imagem" accept="image/*">
              </div>
            </div>                 
            <div class="col-auto ">
              <button  type="submit" class="btn btn-primary"id="Cadastro" ><a class="text-white text-decoration-none" href="produtos_admin.html"> Cadastrar</a></button>
            </div>

            <?php
              if (isset($_GET["erro"]) && $_GET["erro"] == 1) {
                  echo '<p class="error-message">Erro ao cadastrar produto. Por favor, tente novamente com uma imagem valida. No momento só aceitamo imagem em formato png</p>';
              }
            ?>
        </form>
    </div><br>
    </main>

    <footer class="container-fluid">
        <img src="imagens/logo/2-removebg-preview.png" alt="logo">
        <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
    </footer>

    <script src="../Validations/Submit_produtos.js"></script>
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>