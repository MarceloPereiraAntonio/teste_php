<?php
include_once 'models/Empresa.php';

class EmpresaController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function index() {
        $view = new View();
        $view->render('cadastrar_empresa');  // Renderiza a view do formulário de cadastro
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];

            if (empty($nome)) {
                $view = new View();
                $view->render('cadastrar_empresa', ['error' => 'Nome da empresa é obrigatório!']);
                return;
            }

            $empresa = new Empresa($this->conn);
            if ($empresa->cadastrar($nome)) {
                // Armazena a mensagem de sucesso na sessão
                session_start();
                $_SESSION['success_message'] = 'Empresa cadastrada com sucesso!';
                // Redireciona para a página de funcionários após o cadastro
                header('Location: /projeto_php/funcionarios');
                exit();
            } else {
                // Caso haja erro ao cadastrar
                $view = new View();
                $view->render('cadastrar_empresa', ['error' => 'Erro ao cadastrar empresa!']);
            }
        }
    }
}
