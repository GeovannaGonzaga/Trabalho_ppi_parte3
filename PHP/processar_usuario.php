<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = $_POST['emailInput'];
    $passwordInput = md5($_POST['passwordInput']); 
    $tipoCadastro = isset($_POST['tipoCadastro']) ? $_POST['tipoCadastro'] : "Usuário";
    
    // Validar se o tipo de cadastro é válido (pode ser feito com uma tabela no banco de dados)
    $tiposValidos = ["Usuário", "Administrador"];
    $tipoCadastro = in_array($tipoCadastro, $tiposValidos) ? $tipoCadastro : "Usuário";

    $conexao = new Conexao();

    $query = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $conexao->conexao->prepare($query);

    try {
        $stmt->execute([$emailInput, $passwordInput]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $_SESSION['emailInput'] = $usuario['email'];
        
            // Adicione um echo para depuração
            echo "Tipo de Cadastro: " . $tipoCadastro;
        
            // Redirecionamento
            if ($tipoCadastro == "Usuário") {
                echo " Redirecionando para Usuário";
                header("Location: ../User/pagina_usuario.php");
            } elseif ($tipoCadastro == "Administrador") {
                echo " Redirecionando para Administrador";
                header("Location: ../Administrador/admin_control.php");
            } else {
                echo " Tipo de Cadastro inválido";
                header("Location: ../login.php?erro=1");
            }
        
            exit();
        } else {
            header("Location: ../login.php?erro=1");
            exit();
        }
                
    } catch (PDOException $e) {
        echo "Erro ao processar o login. Por favor, tente novamente.";
    }

    $conexao->fecharConexao();
}
?>
