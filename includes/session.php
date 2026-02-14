<?php

class SessionManager {
    public static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setUserSession($userData) {
        $_SESSION['user_id'] = $userData['user_id'] ?? $userData['customer_id'];
        $_SESSION['full_name'] = $userData['full_name'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['role'] = $userData['role'];
        $_SESSION['role_id'] = $userData['role_id'] ?? null;
        $_SESSION['department_id'] = $userData['department_id'] ?? null;
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
    }

    public static function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function logout() {
        $_SESSION = array();
        session_destroy();
    }

    public static function redirectIfNotLoggedIn($redirectTo = 'login.php') {
        if (!self::isLoggedIn()) {
            header("Location: $redirectTo");
            exit();
        }
    }

    public static function redirectIfLoggedIn($redirectTo = 'dashboard.php') {
        if (self::isLoggedIn()) {
            header("Location: $redirectTo");
            exit();
        }
    }
}