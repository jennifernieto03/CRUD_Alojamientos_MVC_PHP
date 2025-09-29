<?php

require_once "../config/database.php";
require_once "../models/User_Model.php";

class User_Controller{
    protected $id_user;
    protected $username;
    private $password;
    protected $id_role;

    public function __construct($username, $password, $id_role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id_role = $id_role;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    //metodo para obtener todos los usuarios
    public static function getUsers(){
        try{
            $list_users = UserModel::all(); //metodo mapeado
            return $list_users;
        }catch(Error $error){
            return "Error al obtener los usuarios: " . $error;
        }
    }

}