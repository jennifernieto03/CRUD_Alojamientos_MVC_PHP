<?php

require_once __DIR__ . '/../config/database.php';

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

    // Verificar si el usuario ya existe por correo
    public static function findByUsername($username)
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener todos los usuarios
    public static function all()
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->query("SELECT * FROM users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Verificar usuario y contraseña (sin usar password_verify aún)
    public static function findByEmailAndPassword($username, $password)
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT id, username, password, id_role FROM users WHERE username = ?");
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Validar contraseña encriptada
        if ($user && password_verify($password, $user['password'])) {
            // Retornar solo los datos necesarios
            return [
                'id' => $user['id'],
                'username' => $user['username'],
                'id_role' => $user['id_role']
            ];
        }

        return null;
    }

    // Agregar un nuevo usuario
    public static function add($username, $password, $id_role)
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("INSERT INTO users (username, password, id_role) VALUES (?, ?, ?)");
        return $query->execute([$username, $password, $id_role]);
    }
}
