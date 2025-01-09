<?php

class Router {
    private $routes = [];

    public function addRoute($method, $route, $controller, $action, $authRequired = false) {
        $route = "~^{$route}$~";
        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'controller' => $controller,
            'action' => $action,
            'authRequired' => $authRequired
        ];
    }

    public function dispatch($uri, $method, $conn) {
        $basePath = '/projeto_php';
        if (strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
    
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['route'], $uri, $matches)) {

                $controllerName = $route['controller'];
                $action = $route['action'];
    
                $controller = new $controllerName($conn);
    
                if (!empty($matches)) {
                    array_shift($matches); 
                    call_user_func_array([$controller, $action], $matches);
                } else {
                    $controller->$action(); 
                }
                return;
            }
        }
    
        // Caso nenhuma rota seja encontrada
        http_response_code(404);
        echo "Erro 404: Rota não encontrada!";
    }
}
