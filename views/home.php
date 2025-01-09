
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center mb-4">Funcionários Cadastrados</h2>

        <?php 
        session_start();
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success" role="alert">';
            echo $_SESSION['success_message'];
            echo '</div>';
            // Limpar a mensagem após exibição
            unset($_SESSION['success_message']);
        }
        ?>

        <?php if (!empty($funcionarios)) { ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Email</th>
                            <th>Empresa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($funcionarios as $funcionario) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($funcionario['nome']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['cpf']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['rg']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['email']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['id_empresa']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning text-center">
                Nenhum funcionário cadastrado.
            </div>
        <?php } ?>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/projeto_php/empresas" class="btn btn-success">Cadastrar Nova Empresa</a>
            <a href="/projeto_php/funcionarios/cadastrar" class="btn btn-primary">Cadastrar Novo Funcionário</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
