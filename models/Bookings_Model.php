<?php

class BookingsModel{
    
    public $id_booking;
    public $id_user;
    public $start_date;
    public $end_date;


    public function __construct( $id_user, $start_date, $end_date)
    {
        $this->id_user = $id_user;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    //obteniendo reservas
    public static function all(){
        //conexion a la base
        $pdo = Connection::getInstance()->getConnection();
        //consultita
        $query = $pdo->query("SELECT * FROM bookings");
        $query->execute(); //ejecutandola
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //agregando reservas 
    public static function add($id_user, $start_date, $end_date){
        //conexion a la base
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("INSERT INTO bookings (id_user, start_date, end_date)
                                VALUES (?, ?, ?);");
        $result = $query->execute(["$id_user", "$start_date", "$end_date"]);
        return $result;
    }

    //eliminando reservas
    public static function delete($id_booking){
        //conexion a la base
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("DELETE FROM bookings WHERE `bookings`.`id` = ?");
        $result = $query->execute([$id_booking]);
        return $result;
    }

    //buscando reservas por id de usuario   
    public static function findByUserId($id_user){
        //conexion a la base
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("SELECT * FROM bookings WHERE id_user = ?");
        $query->execute([$id_user]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
    }

    //buscando reservas por id de usuario   
    public static function findAccomodationByUserID($id_user){
        //conexion a la base
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("SELECT bookings.id_user, bookings_accomodation.id_accomodation FROM bookings INNER JOIN bookings_accomodation ON bookings.id = bookings_accomodation.id_booking WHERE bookings.id_user = ?");
        $query->execute([$id_user]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
    }

}

//pruebas
    /*$datos = BookingsModel::all();
    echo "<pre>";
    var_dump($datos);   
    echo "</pre>";*/
    /*$resultado = BookingsModel::add(
        2,
        "2024-07-01",
        "2024-07-10"
    );
    var_dump($resultado);*/
    /*$resultado = BookingsModel::delete(
        3
    );
    var_dump($resultado);*/
    /*$datos = BookingsModel::findByUserId(2);
    echo "<pre>";
    var_dump($datos);
    echo "</pre>";*/

    