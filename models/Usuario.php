<?php

class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function autenticar($login, $senha) {
        $sql = "SELECT * FROM tb_usuarios WHERE login = :login AND senha = :senha";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':login', $login, PDO::PARAM_STR); 
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);  

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);  
        }

        return false;  
    }
}
