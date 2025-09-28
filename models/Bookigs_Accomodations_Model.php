<?php

require_once '../config/database.php';

class Bookings_AccomodationModel{
    
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

    //buscando reservas e info de alojamiento por id de usuario   
    public static function findAccomodationByIDUser($id_user){
        //conexion a la base
        $pdo = Connection::getInstance()->getConnection();
        //haciendo la consulta
        $query = $pdo->prepare("SELECT bookings.id, bookings.id_user, bookings_accomodation.id_accomodation, accommodation_list.name, accommodation_list.description, accommodation_list.ubication, accommodation_list.review, accommodation_list.image 
                                FROM bookings 
                                INNER JOIN bookings_accomodation ON bookings.id = bookings_accomodation.id_booking 
                                INNER JOIN accommodation_list ON bookings_accomodation.id_accomodation = accommodation_list.id 
                                WHERE bookings.id_user = ?");
        $query->execute([$id_user]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
    }

    
}

//pruebas
    
    /*$resultado = Bookings_Accomodation_Model::findAccomodationByUserID(1);
    var_dump($resultado);*/
    
