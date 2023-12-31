<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="../sobre.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
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
                  <a class="nav-link active border-bottom border-top" aria-current="page" href="configuracao_usuario.html">
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
        <section>
            <div class="container">
                <br>
                <div class="card mb-4 col-md-12 col-sm-12 col-lg-12" >
                  <div class="row g-0">
                    <div class="col-md-7 col-lg-9">
                      <div class="card-body">
                        <h5 class="card-title">Camila Melo</h5>
                        <p class="card-text">19 anos</p>
                        <p class="card-text">Cursando Ciência da Computação (UFRJ)</p>
                        <p class="card-text">Faz estágio como desenvolvedora WEB na empresa Google.</p>
                        <p class="card-text">No início do estágio, adquiriu conhecimentos sólidos e resolveu iniciar o deselvolvimento do site BioSolutions.</p>
                      </div>
                    </div>
                    <div class="col-md-5 col-lg-3">
                      <img src="imagens/Integrantes/camila.png"  class="img-fluid float-end rounded-end"alt="...">
                    </div>
                  </div>
                </div>
                <div class="card mb-4 col-md-12 col-sm-12 col-lg-12" >
                    <div class="row g-0">
                      <div class="col-md-5 col-lg-3">
                        <img src="imagens/Integrantes/victor.png" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-7 col-lg-9">
                        <div class="card-body">
                          <h5 class="card-title">Victor Ramos</h5>
                          <p class="card-text">25 anos</p>
                          <p class="card-text">Graduação em Engenharia de Software pela Universidade UFMG, concluída em 2013.</p>
                          <p class="card-text">Pós-graduação em Gestão de Projetos de TI pela Universidade UFSC, concluída em 2015.</p>
                          <p class="card-text">Ao se formar, juntou-se a Camila, para investirem e iniciarem o projeto do site BioSolutions.</p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card mb-4 col-md-12 col-sm-12 col-lg-12" >
                  <div class="row g-0">
                    <div class="col-md-7 col-lg-9">
                      <div class="card-body ">
                        <h5 class="card-title">Maria Julia Marques</h5>
                        <p class="card-text">24 anos</p>
                        <p class="card-text">Formada em Marketing (USP)</p>
                        <p class="card-text">Realizou algumas campanhas de marketing para algumas empresas, dentre elas: Amazon e Apple.</p>
                        <p class="card-text">Recebeu um convite de Victor e Camila, para gerenciar o Marketing das Vendas e do Site da BioSolutions.</p>
                      </div>
                    </div>
                    <div class="col-md-5 col-lg-3">
                      <img src="imagens/Integrantes/mariajulia.png"  class="img-fluid float-end rounded-end"alt="...">
                    </div>
                  </div>
                </div><br>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h5 class="card-title">Informações Sobre a Disciplina</h5>
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <div class="card-body">
                                <h5 class="card-title">Programação Para Internet</h5>
                                <p class="card-text">A disciplina "Programação para Internet" aborda o desenvolvimento de aplicativos e sites voltados para a web. Os alunos aprendem a criar conteúdo interativo, como páginas da web dinâmicas e aplicações online, utilizando linguagens de programação como HTML, CSS, JavaScript, e muitas vezes, tecnologias de servidor, como PHP, Python ou Java. A disciplina abrange conceitos de design responsivo, segurança na web e integração de bancos de dados para permitir a criação de aplicativos web funcionais e atraentes. É fundamental para que os estudantes adquiram habilidades essenciais na área de desenvolvimento web.</p>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div><br>
            </div>
        </section>
    </main>

    <footer class="container-fluid">
      <img src="imagens/logo/2-removebg-preview.png" alt="logo">
      <p>Para entrar em contato, envie um email para: <a href="contato@example.com">contato@example.com</a></p>
      <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>