<?php

require_once './config/database.php';

class AccomodationModel{
    
    public $id_accomodation;
    public $name;
    public $description;
    public $ubication;
    public $review;
    public $image;

    public function __construct($name, $description, $ubication, $review, $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->ubication = $ubication;
        $this->review = $review;
        $this->image = $image;
    }

    //Obtener los alojamientos
    public static function all(){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->query("SELECT * FROM accommodation_list");
        //ejecutando la consulta
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result;
    }
    

    //Agregar nuevos alojamientos
    public static function add($name, $description, $ubication, $review, $image){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consultaz
        $query = $pdo->prepare("INSERT INTO accommodation_list (name, description, ubication, review, image)
                                VALUES (?, ?, ?, ?, ?);");
        $result = $query->execute(["$name", "$description", "$ubication", $review, "$image"]);
        return $result;
    }

    //Eliminar alojamientos
    public static function delete($id_accomodation){
        //conectandonos a la base de datos
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("DELETE FROM accommodation_list WHERE `accommodation_list`.`id` = ?");
        $result = $query->execute([$id_accomodation]);
        return $result;
    }

}

// Probando datos
/*
    $datos = AccomodationModel::all();
    echo "<pre>";
    var_dump($datos);
    echo "</pre>";
*/
/*$resultado = AccomodationModel::add(
    "Hostal El Sol", 
    "Alojamiento cómodo y céntrico", 
    "San Salvador", 
    4.5, 
    "https://res.cloudinary.com/djn6tkvvl/image/upload/v1758169661/picture-san-salvador-la-zona-hostel-23_uu4uld.jpg"
);*/

/*$resultado = AccomodationModel::delete(
    8
);*/