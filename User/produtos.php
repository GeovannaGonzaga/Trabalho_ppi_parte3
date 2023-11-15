<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="produtos.css" rel="stylesheet">
    <link href="nav.css" rel="stylesheet">
    <title> Bios </title>
  </head>
  <body>
    
    <header>
        <nav class="navbar navbar-light navbar-container" id="navbar">  
        <div class="home"><a href="pagina_usuario.php"><img src="imagens/logo/2-removebg-preview.png" alt="logo"></a></div>
        <form class="d-flex form-container">
            <input class="form-control me-2" type="search" placeholder="Busque aqui o produto desejado" aria-label="Search">
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
                                // Adicione redirecionamento para a página de login, se necessário
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

    <main>
    <section id="slides">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner ">
              <div class="carousel-item active">
                <img src="imagens/Modal/Slide1.PNG" class="img-fluid" alt="modal"> <!-- https://source.unsplash.com/1400x500/?jakets < em 1400x500 coloca a altura e largura> <depois do ? coloca o nome do que voce quer ver> -->
              </div>
              <div class="carousel-item">
                <img src="imagens/Modal/Slide2.PNG" class="img-fluid" alt="modal">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>

      <p class="title-products" >Produtos</p>
      <section id="conteudo">
        <div class="row ">
          <div class="col-md-12 col-sm-12 col-lg-12 ">

              <div class="row"> 
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/bagcroche.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 49,99</strong></p>
                          <p class="card-text">Bolsa de Crochê</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button" >-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1" >
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/calendario.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 19,99</strong></p>
                          <p class="card-text">Calendário de Papel Semente</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/caneta.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 2,99</strong></p>
                          <p class="card-text">Caneta de Papel Kraft</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/canudo.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 99,99</strong></p>
                          <p class="card-text">Canudo de Aço Inox</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/copo.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 4,99</strong></p>
                          <p class="card-text">Copo de Papel de Fibras</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/ecobag.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 69,99</strong></p>
                          <p class="card-text">EcoBag</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/escova.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 19,99</strong></p>
                          <p class="card-text">Escova Dental de Bambu</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
                <div class="col col-md-3">
                  <div class="card">
                      <img src="imagens/produtos/esponja.PNG" class="card-image" alt="Produto">
                      <div class="card-body">
                          <p class="card-text value"><strong>R$ 9,99</strong></p>
                          <p class="card-text">Esponja Natural</p>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary decrement" type="button">-</button>
                              </div>
                              <input type="text" class="form-control quantity" value="1">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary increment" type="button">+</button>
                              </div>
                          </div>
                          <a href="comprar.html" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>
            
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
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../Validations/produtos.js"></script>

  </body>
</html>