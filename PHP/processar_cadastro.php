<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomeInput = $_POST['nomeInput'];
    $generoInput = isset($_POST['flexRadioDefault']) ? $_POST['flexRadioDefault'] : "Não informar";
    $cpfInput = $_POST['cpfInput'];
    $nascimentoInput = $_POST['nascimentoInput'];
    $telefoneInput = $_POST['telefoneInput'];
    $emailInput = $_POST['emailInput'];
    $passwordInput = md5($_POST['passwordInput']); 
    $tipoCadastro = isset($_POST['tipoCadastro']) ? $_POST['tipoCadastro'] : "Usuário";
    

    $conexao = new Conexao();

    $query = "INSERT INTO usuarios (nome, genero, cpf, data_nascimento, telefone, email, senha, tipo_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->conexao->prepare($query);
    

    try {
        $stmt->execute([$nomeInput, $generoInput, $cpfInput, $nascimentoInput, $telefoneInput, $emailInput, $passwordInput, $tipoCadastro]);
        echo "Cadastro realizado com sucesso!";
        header("Location: ../login.php"); //pensar em como chamar o home.php
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário. Por favor, tente novamente.";
    }

    $conexao->fecharConexao();
}
?>
