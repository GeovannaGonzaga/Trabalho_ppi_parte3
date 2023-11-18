
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bios - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="cadastro.css" rel="stylesheet">
</head>
<body>


  <header>
    <div class="home">
      <a href="index.html">
        <img src="imagens/logo/1-removebg-preview.png" alt="logo">
      </a>
    </div>
  </header>

  <main>
    <div class="login">
      <p>
        <img src="https://img.icons8.com/small/40/127dbb/add-user-male.png"/>
        Login do Cliente
      </p>
    </div>


    <form id="login-form" action="PHP/processar_usuario.php" method="post">
      <div class="telalogin">

        <div class="row mb-4">
          <div class="col-sm-12 form-floating">
            <input type="text" class="form-control" id="emailInput" name="emailInput" placeholder="Ex. joaodasilva@gmail.com"  onblur="validarEmail(this)">
            <label for="floatingInput">E-mail:</label>
            <span id="EmailError" class="error-message"></span>
          </div>
        </div>

        <div class="row mb-3 password">
            <div class="form-floating">
              <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Senha"  onblur="validarSenha(this)">
              <label for="floatingPassword">Senha:</label>
              <span id="passwordError" class="error-message"></span>
            </div>
          </div>

        <?php
          if (isset($_GET["erro"]) && $_GET["erro"] == 1) {
              echo '<p class="error-message">Usuário não encontrado. Tente novamente.</p>';
          }
        ?>
          
        <div class="col-auto">
          <button type="submit" class="btn btn-primary" id="login">Continuar</button>
        </div>

        <p class="Register">
          Não tem cadastro? <a href="cadastro.html">Cadastre-se</a>
        </p><br>

      </div>
    </form>

  </main>

  <footer class="container-fluid"><br>
    <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
  </footer>

  <script src="script.js"></script> 
  <script src="Validations/Submit.js"></script>
  <script src="Validations/email.js"></script>
  <script src="Validations/senha.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>


