<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-center mb-4">Cadastrar Nova Empresa</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="/projeto_php/empresas/cadastrar" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Empresa</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome da empresa" required>
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
