<?php
class Conexao {
    public $conexao;

    function __construct() {
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=bancodedados', 'root', ''); // Ajuste conforme necessário
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function fecharConexao(){
        if (isset($this->conexao)) {
            $this->conexao = null;
        }
    }
}
?>
