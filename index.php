<?php 
    session_start();
    require 'controller/LoginController.php';

    if(isset($_POST['email'], $_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        LoginController::login($email, $password);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Tareas</title>
</head>
<body>
    <main>
        <h1>Inicio de sesion</h1>
        <form action="" method="POST">
            <label for="username">Correo Electronico:</label>
            <input type="text" id="username" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar Sesión</button>   
        </form>
    </main>
</body>
</html>