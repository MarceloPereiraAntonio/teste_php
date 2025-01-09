<?php

class AuthMiddleware {
    public static function checkAuth() {
        header("Location: /projeto_php/login");
        exit();
    }
}
