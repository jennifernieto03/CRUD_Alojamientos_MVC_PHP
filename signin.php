
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styleAuth.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <!-- Manejo de alertas con SweetAlert2 -->
    <?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php if ($_GET['error'] === 'existe'): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario ya registrado',
                        text: 'Intenta iniciar sesión o usa otro correo.',
                        confirmButtonColor: '#6f42c1'
                    });
                <?php elseif ($_GET['error'] === 'fallo'): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: 'Intenta nuevamente más tarde.',
                        confirmButtonColor: '#6f42c1'
                    });
                <?php elseif ($_GET['success'] === 'ok'): ?>
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso',
                        text: 'Tu cuenta ha sido creada correctamente.',
                        confirmButtonColor: '#6f42c1'
                    });
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>

    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h2 class="text-center text-purple mb-4">Crear Cuenta</h2>
        <form method="POST" action="controller/User_Controller.php">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-purple w-100">Registrarse</button>
            <div class="text-center mt-3">
                <a href="login.php" class="text-decoration-none text-purple">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>