<?php

class Empresa {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn; 
    }

    public function listar() {
        $sql = "SELECT * FROM tb_empresas";
        $stmt = $this->conn->prepare($sql);  // Usando prepared statement
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retorna todos os resultados como um array associativo
    }

    public function cadastrar($nome) {
        $sql = "INSERT INTO tb_empresas (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        return $stmt->execute();
    }
}
