<?php

require_once "../models/User_Model.php";
require_once "../config/database.php";

class LoginController{

    public static function login($username, $password){
        //verificar si el usuario y la contraseña son correctos
        $user = UserModel::findByEmailAndPassword($username, $password);

        //si el empleado existe creamos la sesion y validamos el rol
        if($user){

            $role = $user['id_role'];
            //crear sessiones
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];

            if($role == 1){
                //redireccionar a la vista de administrador
                header("Location: user.php");
            }else{
                //redireccionar a la vista de empleado
                header("Location: admin.php");
            }
        }else{
            echo "Correo o contraseña incorrectos";
        }
    }

    //eliminar la sesion
    public static function logout(){
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
