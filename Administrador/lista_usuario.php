<?php
include('../PHP/conexao.php');

$conexao = new Conexao();
$query = "SELECT * FROM usuarios";
$stmt = $conexao->conexao->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conexao->fecharConexao();

// Recupera o ID do usuário da URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Consulta o banco de dados para obter os dados do usuário pelo ID
    // Implemente a lógica de consulta aqui

    // Exemplo de formulário de edição
    echo '<form method="POST" action="atualizar_usuario.php">
            <!-- Campos do formulário para edição -->
            <input type="hidden" name="id" value="' . $id . '">
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
          </form>';
} else {
    echo 'ID do usuário não fornecido.';
}

// Recupera o ID do usuário da URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Consulta o banco de dados para obter os dados do usuário pelo ID
    // Implemente a lógica de consulta aqui

    // Exemplo de formulário de edição
    echo '<form method="POST" action="atualizar_usuario.php">
            <!-- Campos do formulário para edição -->
            <input type="hidden" name="id" value="' . $id . '">
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
          </form>';
} else {
    echo 'ID do usuário não fornecido.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/> 
    <link rel="stylesheet" type="text/css" href="../DataTables/DataTables-1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="lista_usuario.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="../js/jquery-3.7.1.js"></script>
    <script  type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbar-container" id="navbar">
        <div class="home"><a href="index.html"> <img src="imagens/logo/2-removebg-preview.png" alt="logo"></a></div>
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
                    <a class="nav-link active border-bottom border-top" aria-current="page" href="produtos_admin.php">
                        <p class="Options"><img src="https://img.icons8.com/pastel-glyph/25/127dbb/shopping-bag--v3.png"> Meu menu</p>
                    </a>
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

                    <a class="nav-link active border-bottom border-top" aria-current="page" href="../index.html">
                        <p class="Options"><img src="https://img.icons8.com/ios/19/127dbb/exit--v1.png"/> Sair</p>
                    </a>
                </li>
            </div>
        </nav>
    </header>
    
    <main>
        <br><br><h2>Lista de Usuários Cadastrados</h2>

        <button id="limparTabela" class="btn btn-danger">Limpar Tabela</button><br><br>

        <table id="tabelaUsuarios" class="table table-bordered dataTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Usuário</th>
                    <th>Genêro</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>tipo de Cadastro</th>
                
                </tr>
            </thead>
            <tbody>

            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                <td>
                    <a href="../PHP/editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="../PHP/excluir_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                </td>
                    <td><?= isset($usuario['nome']) ? htmlspecialchars($usuario['nome']) : '' ?></td>
                    <td><?= isset($usuario['genero']) ? htmlspecialchars($usuario['genero']) : '' ?></td>
                    <td><?= isset($usuario['cpf']) ? htmlspecialchars($usuario['cpf']) : '' ?></td>
                    <td><?= isset($usuario['data_nascimento']) ? htmlspecialchars($usuario['data_nascimento']) : '' ?></td>
                    <td><?= isset($usuario['telefone']) ? htmlspecialchars($usuario['telefone']) : '' ?></td>
                    <td><?= isset($usuario['email']) ? htmlspecialchars($usuario['email']) : '' ?></td>
                    <td><?= isset($usuario['senha']) ? htmlspecialchars($usuario['senha']) : '' ?></td>
                    <td><?= isset($usuario['tipo_cadastro']) ? htmlspecialchars($usuario['tipo_cadastro']) : '' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            
        </table>
    </main><br><br>

    <footer class="container-fluid">
        <img src="imagens/logo/2-removebg-preview.png" alt="logo">
        <p>Para entrar em contato, envie um email para: <a href="contato@example.com">contato@example.com</a></p>
        <p id="direitos">&copy;2023 Bios | Todos Direitos Reservados</p>
    </footer>

    
    <script src="../Validations/lista_usuario.js"></script>
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
