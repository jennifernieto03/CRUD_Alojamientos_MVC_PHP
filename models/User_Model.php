<?php

class UserModel{
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

    //metodo para obtener todas los alojamientos
    public static function all(){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->query("SELECT tasks.id, tasks.title, tasks.description, tasks.status, tasks.id_employee, employees.name as employee FROM tasks JOIN employees ON tasks.id_employee = employees.id");
        //ejecutando la consulta
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result;
    }

    //Obtener alojamientos por id de usuario
    public static function getAccomodationByUserID($id_user){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("DELETE FROM accommodation_list WHERE `accommodation_list`.`id` = ?");
        $result = $query->execute([$id_accomodation]);
        return $result;
    }

    /*
   //metodo para agregar un usuario nuevo
    public static function add($username, $password, $id_role){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("INSERT INTO users (username, password, id_role) VALUES (?, ?, ?);");
        $result = $query->execute(["$username", "$password", $id_role]);
        return $result;
    }
    //agregar alojamientos
    public static function delete($id_user){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("DELETE FROM users WHERE `users`.`id` = ?");
        $result = $query->execute([$id_user]);
        return $result;
    }
    //eliminar alojamientos
    public static function findById($id_user){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id_user]);
        $result = $query->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }
    }*/

    //metodo para guardar cambios en una tarea
    public static function edit($id_task, $title, $description){
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
        $result = $query->execute(["$title", "$description", $id_task]);
        return $result;
    }
}