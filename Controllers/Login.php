<?php

// Ganti dengan db yang sesuai jika mengguna
require_once __DIR__ . '/../Config/DB.php';

class LoginController {
    public function login($username, $password) {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../index.php");
            exit();
        }

        return false;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }
}

?>