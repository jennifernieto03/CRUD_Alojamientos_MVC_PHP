<?php

require_once "models/Accomodation_Model.php";
require_once "models/Bookings_Accomodation_Model.php";
require_once "../models/Bookings_Model.php";
require_once "../interfaces/ICRUDAccomodations.php";

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
        try{
            $Accomodation->add();
            //redireccionar a una vista
            header('Location: ../views/listAccomodations.php');
        }catch(Error $error){
            return "Error al guardar los datos " . $error;
        }
    }

    //Encontrar alojamiento por ID de usuario
    public static function findAccomodationByUserID(){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = BookingsModel::findAccomodationByUserID(); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al encontrar el alojamiento: " . $error;
        }
    }

    //Eliminar alojamiento por ID de reserva
    public static function deleteByBookingID(){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = BookingsModel::deleteByBookingID(); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al eliminar la reserva: " . $error;
        }
    }

}