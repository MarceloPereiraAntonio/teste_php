<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-center mb-4">Cadastrar Novo Funcionário</h2>

        <!-- Exibe mensagem de erro caso algum campo não seja preenchido -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="/projeto_php/funcionarios/cadastrar" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do funcionário" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o CPF do funcionário" required>
            </div>
            <div class="mb-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" id="rg" name="rg" class="form-control" placeholder="Digite o RG do funcionário" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Digite o email do funcionário" required>
            </div>

            <!-- Select para escolher a empresa -->
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <select id="empresa" name="empresa" class="form-control" required>
                    <option value="">Selecione a empresa</option>
                    <?php foreach ($empresas as $empresa) { ?>
                        <option value="<?php echo htmlspecialchars($empresa['id_empresa']); ?>"><?php echo htmlspecialchars($empresa['nome']); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="/projeto_php/funcionarios" class="btn btn-secondary">Voltar para Funcionários</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
