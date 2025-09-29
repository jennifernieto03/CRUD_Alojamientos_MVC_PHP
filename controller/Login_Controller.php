<?php

require_once "./models/User_Model.php";
require_once "./config/database.php";

class LoginController
{

    public static function login($username, $password)
{
    // Verificar si el usuario y la contraseña son correctos
    $user = UserModel::findByEmailAndPassword($username, $password);

    // Validación si el usuario no existe
    if (!$user) {
        header("Location: login.php?error=usuario");
        exit();
    }

    // Validación si la contraseña es incorrecta
    if ($user['password'] !== $password) {
        header("Location: login.php?error=clave");
        exit();
    }

    // Si el usuario existe y la contraseña es correcta
    $role = $user['id_role'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['id'] = $user['id'];

    if ($role == 1) {
        header("Location: user.php");
    } else {
        header("Location: admin.php");
    }
}


    //eliminar la sesion
    public static function logout()
    {
        //continuar la sesion
        session_start();

        //eliminar los datos de sesion
        session_destroy();

        //eliminar las variables de sesion
        session_unset();

        header("Location: index.php");
    }
}

//Pruebas

    /*
        $resultado = new LoginController();
        $resultado -> login("Jennifer123", "123546");
    */
