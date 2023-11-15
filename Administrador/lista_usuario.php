<?php
include('../PHP/conexao.php');

$conexao = new Conexao();
$query = "SELECT * FROM usuarios";
$stmt = $conexao->conexao->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conexao->fecharConexao();
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

    <script src="../js/jquery-3.7.1.js"></script>
    
    
    <script  type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    
    <h2>Lista de Usuários Cadastrados</h2>

    <button id="limparTabela" class="btn btn-danger">Limpar Tabela</button><br><br>

    <table id="tabelaUsuarios" class="table table-bordered dataTable">
        <thead>
            <tr>
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

    <script src="../Validations/lista_usuario.js"></script>

</body>
</html>
