<?php

require_once './config/database.php';

class UserModel
{
    public $id_user;
    public $username;
    public $password;
    public $id_role;

    public function __construct($username, $password, $id_role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id_role = $id_role;
    }

    public static function findByUsername($username)
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_ASSOC); // Devuelve el usuario si existe
    }

    //Obtener todos los usuarios
    public static function all()
    {
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->query("SELECT * FROM users");
        //ejecutando la consulta
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result;
    }

    //metodo para verificar correo y contraseña
    public static function findByEmailAndPassword($username, $password)
    {
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("SELECT id, username, id_role FROM users WHERE username = ? AND password = ?");
        $query->execute(["$username", "$password"]);
        $result = $query->fetch(PDO::FETCH_ASSOC); //[] -> envia un registro
        return $result;
    }

    //metodo para agregar un usuario nuevo
    public static function add($username, $password, $id_role)
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("INSERT INTO users (username, password, id_role) VALUES (?, ?, ?);");
        $result = $query->execute(["$username", "$password", $id_role]);
        return $result;
    }
}
