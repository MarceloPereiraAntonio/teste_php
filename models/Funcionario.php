<?php

class Funcionario {
    private $conn;

    public function __construct($conn) {
    }

    public function listar() {
        if ($this->conn == null) {
            throw new Exception("Conexão com o banco de dados não foi inicializada.");
        }

        $sql = "SELECT * FROM tb_funcionarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    public function cadastrar($nome, $cpf, $rg, $email, $empresa) {
        $sql = "INSERT INTO tb_funcionarios (nome, cpf, rg, email, id_empresa) VALUES (:nome, :cpf, :rg, :email, :empresa)";
        
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':empresa', $empresa, PDO::PARAM_INT);  
        
        return $stmt->execute();
    }
}


