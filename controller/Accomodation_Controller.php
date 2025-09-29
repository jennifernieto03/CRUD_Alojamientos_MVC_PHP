<?php

require_once "./models/Accomodation_Model.php";
require_once "./models/Bookigs_Accomodations_Model.php";
require_once "./models/Bookings_Model.php";
require_once "./interfaces/ICRUDAccomodations.php";

class Accomodation_Controller implements ICRUDAccomodations{

    //Obtener lista de alojamientos
    public static function getAccomodation(){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = AccomodationModel::all(); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al obtener los alojamientos: " . $error;
        }
    }

    //Agregar alojamiento a la base de datos (Admin)
    public static function createAccomodation(AccomodationModel $Accomodation){
    try {
        AccomodationModel::add(
            $Accomodation->name,
            $Accomodation->description,
            $Accomodation->ubication,
            $Accomodation->review,
            $Accomodation->image
        );
        header('Location: ../views/listAccomodations.php');
    } catch(Error $error){
        return "Error al guardar los datos " . $error;
    }
}


    //Encontrar alojamiento por ID de usuario
    public static function findAccomodationByUserID(Bookings_AccomodationModel $Bookings_accomodation){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = Bookings_AccomodationModel::findAccomodationByIDUser($Bookings_accomodation->id_user); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al encontrar el alojamiento: " . $error;
        }
    }

    //Eliminar alojamiento por ID de reserva
    public static function deleteByBookingID(BookingsModel $Bookings){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = BookingsModel::deleteByBookingID($Bookings->id_user); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al eliminar la reserva: " . $error;
        }
    }

}