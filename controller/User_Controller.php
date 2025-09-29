<?php

require_once "../config/database.php";
require_once "../models/User_Model.php";

class User_Controller {
    public static function registerUser($username, $password, $id_role = 2) {
        // Verificar si el usuario ya existe
        $existe = UserModel::findByUsername($username);
        if ($existe) {
            header("Location: ../signin.php?error=existe");
            exit();
        }

        // Encriptar contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Registrar usuario
        $resultado = UserModel::add($username, $hashedPassword, $id_role);

        if ($resultado) {
            header("Location: ../signin.php?success=ok");
        } else {
            header("Location: ../signin.php?error=fallo");
        }
        exit();
    }
}

// ✅ Recibir datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $id_role = 2;

        User_Controller::registerUser($username, $password, $id_role);
    }
}
