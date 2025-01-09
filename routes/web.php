<?php

$router = new Router();
$router->addRoute('GET', '/', 'AuthController', 'showLogin');
$router->addRoute('POST', '/login', 'AuthController', 'login');
$router->addRoute('GET', '/funcionarios', 'FuncionarioController', 'index');
$router->addRoute('GET', '/funcionarios/cadastrar', 'FuncionarioController', 'cadastrar');
$router->addRoute('POST', '/funcionarios/cadastrar', 'FuncionarioController', 'cadastrar');
$router->addRoute('GET', '/empresas', 'EmpresaController', 'index');  
$router->addRoute('POST', '/empresas/cadastrar', 'EmpresaController', 'cadastrar');  

return $router;
