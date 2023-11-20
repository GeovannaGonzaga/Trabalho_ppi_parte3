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
            <p><img src="https://img.icons8.com/small/40/127dbb/add-user-male.png">Fale Conosco</p>
        </div>
        <div class="telacadastro">
            <form id="cadastro-form" action="process_form.php" method="post">
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="nomeInput" name="nomeInput" placeholder="Nome Completo" onblur="ValidarNome(this)" required>
                        <label for="nomeInput">Nome:</label>
                        <span id="NomeError" class="error-message"></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="cpfInput" name="cpfInput" placeholder="CPF" onblur="validarcpf(this); Acpted_Number(event)" required>
                        <label for="cpfInput">CPF:</label>
                        <span id="CpfError" class="error-message"></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="telefoneInput" name="telefoneInput" placeholder="(00) 00000-0000" onblur="validarTelefone(this); Acpted_Number(event)" required>
                        <label for="telefoneInput">Telefone:</label>
                        <span id="telefoneError" class="error-message"></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="emailInput" name="emailInput" placeholder="Ex. joaodasilva@gmail.com" onblur="validarEmail(this)" required>
                        <label for="emailInput">E-mail:</label>
                        <span id="EmailError" class="error-message"></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <input type="text" class="form-control" id="assuntoInput" name="assuntoInput" placeholder="Assunto" required>
                        <label for="assuntoInput">Assunto:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 form-floating">
                        <textarea class="form-control" id="opiniaoInput" name="opiniaoInput" placeholder="Diga a sua opinião" required></textarea>
                        <label for="opiniaoInput">Sua Opinião:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" id="Cadastro">Enviar</button>
                    </div>
                </div>
                <br>
            </form>
        </div> 
    </main>

    <footer class="container-fluid"><br>
        <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
    </footer>

    <script src="script.js"></script>
    <script src="Validations/Submit.js"></script>
    <script src="Validations/nome.js"></script> 
    <script src="Validations/telefone.js"></script>
    <script src="Validations/Validar_Entrada.js"></script> 
    <script src="Validations/cpf.js"></script>
    <script src="Validations/email.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
