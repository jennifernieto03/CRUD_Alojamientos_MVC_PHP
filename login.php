<?php
session_start();
require_once 'controller/Login_Controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        LoginController::login($email, $password); // Este método ya hace la validación
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleAuth.css">
    <link rel="stylesheet" href="styles/styleContent.css?v=2">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-orange text-white fixed-top shadow-sm px-4">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Aloha</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-white" href="contenido.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="user.php">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="user.php">Perfil</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Perfil" class="profile-icon">
                    <a href="login.php" class="btn btn-outline-light">Iniciar Sesión</a>
                    <a href="signin.php" class="btn btn-outline-light">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>
    <?php if (isset($_GET['error'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php if ($_GET['error'] === 'usuario'): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario no registrado',
                        text: 'Verifica tu correo o regístrate primero.',
                        confirmButtonColor: '#6f42c1'
                    });
                <?php elseif ($_GET['error'] === 'clave'): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Contraseña incorrecta',
                        text: 'Intenta nuevamente.',
                        confirmButtonColor: '#6f42c1'
                    });
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>
    <!-- Formulario de login -->
    <main class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h2 class="text-center text-purple mb-4">Iniciar Sesión</h2>
            <form method="POST" action="login.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-purple w-100">Entrar</button>
                <div class="text-center mt-3">
                    <a href="signin.php" class="text-decoration-none text-purple">¿No tienes cuenta? Regístrate</a>
                </div>
            </form>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>