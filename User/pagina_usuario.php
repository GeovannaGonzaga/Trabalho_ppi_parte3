<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Páginas do Usuário</title>
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
            <a href="login.html" style="text-decoration: none;">
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
                <img src="imagens/Modal/Slide1.PNG" class="img-fluid" alt="Bios"> <!-- https://source.unsplash.com/1400x500/?jakets < em 1400x500 coloca a altura e largura> <depois do ? coloca o nome do que voce quer ver> -->
              </div>
              <div class="carousel-item">
                <img src="imagens/Modal/Slide2.PNG" class="d-block w-100" alt="Bios">
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
      
      <section>
        <div class="container"> <br><br><br>
            <div class="sobrenos"><br>
            <h1>Sobre nós</h1><br><br>
            <h2>Quem Somos</h2>
            <a>Somos a BioSolutions, uma empresa apaixonada por proteger nosso planeta. Acreditamos que pequenas ações podem criar grandes mudanças.</a><br><br>
            <h2>Missão e Valores</h2>
            <a>Nossa missão é fornecer produtos ecológicos de alta qualidade. Nossos valores incluem respeito à natureza, inovação e impacto positivo na comunidade.</a><br><br>
            <h2>Nossa Visão</h2>
            <a>Vislumbramos um mundo em que todos vivam em harmonia com a natureza, escolhendo produtos sustentáveis e conscientes</a><br><br>
            <h2>Nossa História</h2>
            <a>Em 2010, um grupo de amigos preocupados com o meio ambiente decidiu criar a Ecoterra. Começamos com uma pequena loja local e um grande sonho. Nos anos seguintes, enfrentamos desafios, mas também vimos nosso impacto crescer. Expandimos para várias cidades e nos tornamos líderes no mercado de produtos ecológicos. Hoje, a BioSolutions é uma referência em sustentabilidade, com lojas em todo o país e uma loja online próspera.</a><br><br>
            <h2>Nossa Cultura</h2>
              
            <a>Compromisso com a Sustentabilidade: Aqui na BioSolutions, vivemos o que pregamos. Nossas lojas são alimentadas por energia solar, e nossa equipe participa de programas de reflorestamento.</a><br>
            <a>Dedicação da Equipe: Nossa equipe é composta por entusiastas da natureza e ativistas ambientais. Estamos comprometidos em fazer a diferença.</a><br>
            <a>Impacto Social: Além de vender produtos ecológicos, também doamos uma porcentagem de nossos lucros para projetos de conservação e educação ambiental.</a><br><br>
            <h2>Estratégias Sustentáveis</h2>
              
            <a>Produtos Ecológicos: Nossos produtos incluem roupas orgânicas, utensílios de cozinha recicláveis e produtos de limpeza biodegradáveis.</a><br>
            <a>Inovação Ambiental: Desenvolvemos embalagens reutilizáveis e investimos em transporte sustentável para reduzir nossa pegada de carbono.</a><br>
            <a>Conscientização e Educação: Realizamos eventos educacionais e oferecemos workshops para sensibilizar a comunidade sobre a importância da sustentabilidade.</a><br><br><br>
          </div>
        </div>
      </section><br><br><br>
  </main>

  <footer class="container-fluid">
        <img src="imagens/logo/2-removebg-preview.png" alt="logo">
        <p>Para entrar em contato, envie um email para: <a href="contato@example.com">contato@example.com</a></p>
        <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
