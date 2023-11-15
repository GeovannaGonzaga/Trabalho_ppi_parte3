<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="cadastro.css" rel="stylesheet">
  <title>Bios</title>
</head>
<body>

  <header>
    <div class="home">
      <a href="pagina_usuario.php"><img src="imagens/logo/1-removebg-preview.png" alt="logo"></a>
    </div> 
  </header> 

  <main>
    <div class="cadastro">
      <p><img src="https://img.icons8.com/small/40/127dbb/add-user-male.png"> Nos mande sua dúvida ou reclamação</p>
    </div>

    <form id="cadastro-form">
      <div class="telacadastro">
          <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                <input type="email" class="form-control" id="emailInput" placeholder="Ex. joaodasilva@gmail.com">
                <label for="emailInput">E-mail:</label>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                <input type="text" class="form-control" id="assuntoInput" placeholder="Assunto da mensagem">
                <label for="assuntoInput">Assunto:</label>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-12 form-floating">
                <textarea class="form-control" id="descricaoInput" rows="4" placeholder="Descreva sua mensagem"></textarea>
                <label for="descricaoInput">Descrição:</label>
              </div>
            </div>

            <div class="col-auto">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
      </div>
    <form>
  </main>

  <footer class="container-fluid"><br>
      <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="validacao.js"></script>
</body>
</html>
