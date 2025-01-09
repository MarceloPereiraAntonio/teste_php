<?php
include_once 'models/Usuario.php';

class AuthController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function showLogin() {
        $view = new View();
        $view->render('login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            // Verifica se o e-mail é válido
            if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $view = new View();
                $view->render('login', ['error' => 'E-mail inválido!']);
                return;
            }

            $usuario = new Usuario($this->conn);
            $user = $usuario->autenticar($login, $senha);

            if ($user) {
                header('Location: /projeto_php/funcionarios');  
                exit(); 
            } else {
                $view = new View();
                $view->render('login', ['error' => 'Usuário ou senha inválidos!']);
            }
        }
    }

    public function logout() {
        header('Location: /projeto_php/login'); 
        exit(); 
    }
}
