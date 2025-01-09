<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configuração do autoloader
spl_autoload_register(function ($class) {
    $directories = [
        __DIR__ . '/core/',        
        __DIR__ . '/controllers/', 
        __DIR__ . '/models/',      
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    throw new Exception("Classe {$class} não encontrada.");
});

require_once 'config/database.php';

$database = new Database();
$conn = $database->connect(); 
$router = require_once 'routes/web.php';

// Obtém a URI e o método da requisição
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Passa a conexão para o roteador
$router->dispatch($uri, $method, $conn);  // Passa a conexão como parâmetro para o roteador
