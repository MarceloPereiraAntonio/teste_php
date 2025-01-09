<?php

class AuthMiddleware {
    public static function checkAuth() {
        session_start();
        if (empty($_SESSION['user'])) {
            header('Location: /projeto_php/login');
            exit;
        }
    }
}
