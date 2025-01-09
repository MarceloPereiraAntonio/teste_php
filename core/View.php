<?php

class View {
    public function render($view, $data = []) {
        // Verifica se a view existe
        $viewFile = "views/{$view}.php";
        if (file_exists($viewFile)) {
            // Extrai as variáveis do array $data para dentro do escopo da view
            extract($data);
            // Inclui o arquivo da view
            include($viewFile);
        } else {
            echo "View não encontrada: {$view}";
        }
    }
}
