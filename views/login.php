<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            
            <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="alert alert-danger text-center" role="alert">
                    Login ou senha inválidos.
                </div>
            <?php endif; ?>

            <form action="/projeto_php/login" method="POST">  
                <div class="mb-3">
                    <label for="login" class="form-label">Login:</label>
                    <input type="text" id="login" name="login" class="form-control" placeholder="Digite seu login" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite sua senha" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
