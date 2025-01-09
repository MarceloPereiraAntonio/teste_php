<?php

class FuncionarioController extends Controller {
    private $conn;
    private $funcionarioModel;
    private $empresaModel;

    public function __construct($conn) {
        parent::__construct();  
        $this->conn = $conn;
        $this->funcionarioModel = new Funcionario($conn);  
        $this->empresaModel = new Empresa($conn);  
    }

    public function index() {
        try {
            $funcionarios = $this->funcionarioModel->listar(); 

            $data = [
                'funcionarios' => $funcionarios
            ];

            $this->view->render('home', $data);

        } catch (Exception $e) {
            $this->view->render('error', ['message' => $e->getMessage()]);
        }
    }

    public function cadastrar() {
        $empresas = $this->empresaModel->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $email = $_POST['email'];
            $empresa = $_POST['empresa'];

            if (empty($nome) || empty($cpf) || empty($rg) || empty($email) || empty($empresa)) {
                $view = new View();
                $view->render('cadastrar_funcionario', ['error' => 'Todos os campos são obrigatórios!', 'empresas' => $empresas]);
                return;
            }

            if (strlen($email) > 255) {
                $view = new View();
                $view->render('cadastrar_funcionario', ['error' => 'O email não pode ter mais de 255 caracteres.', 'empresas' => $empresas]);
                return;
            }

            $resultado = $this->funcionarioModel->cadastrar($nome, $cpf, $rg, $email, $empresa);

            if ($resultado) {
                session_start();
                $_SESSION['success_message'] = 'Funcionário cadastrado com sucesso!';
                header('Location: /projeto_php/funcionarios');
                exit();
            } else {
                $view = new View();
                $view->render('cadastrar_funcionario', ['error' => 'Erro ao cadastrar funcionário.', 'empresas' => $empresas]);
            }
        } else {
            $view = new View();
            $view->render('cadastrar_funcionario', ['empresas' => $empresas]);
        }
    }

}
