<?php
session_start();
$_SESSION['username'] = $user['username']; // atau apapun nama field user-nya

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../Config/DB.php';
require_once __DIR__ . '/../Controllers/Login.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginController = new LoginController();
    if ($loginController->login($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: index.php?url=dashboard");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(to right, #17a2b8, #138496);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .login-box {
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 420px;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-title {
        font-size: 2rem;
        font-weight: bold;
        color: #17a2b8;
    }

    .brand-name {
        color: #138496;
        font-size: 1.25rem;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .form-control:focus {
        border-color: #17a2b8;
        box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.2);
    }

    .btn-login {
        background-color: #17a2b8;
        border: none;
        border-radius: 8px;
        font-weight: bold;
    }

    .btn-login:hover {
        background-color: #138496;
    }

    .icon-box {
        font-size: 3rem;
        color: #17a2b8;
        text-align: center;
        margin-bottom: 20px;
    }

    .show-password {
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 36px;
        color: #6c757d;
    }
</style>

<div class="login-box">
    <div class="icon-box">
        <i class="fas fa-store-alt"></i>
    </div>
    <h2 class="text-center login-title">Login</h2>
    <p class="text-center brand-name">POS Kelompok 14</p>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan username">
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password">
            <span class="show-password" onclick="togglePassword()"><i class="fas fa-eye mt-2" id="toggleIcon"></i></span>
        </div>
        <button type="submit" name="submit" class="btn btn-login w-100 text-white">Login</button>
        <?php if (isset($error)) echo "<div class='alert alert-danger mt-3'>$error</div>"; ?>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Show Password Script -->
<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

