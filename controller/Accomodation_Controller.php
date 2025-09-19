<?php

require_once "../models/Accomodation_Model.php"
require_once "../models/Bookings_Model.php";
require_once "../interfaces/ICRUDAccomodations.php"

class Accomodation_Controller implements ICRUDAccomodations{

    public static function getAccomodation(){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = AccomodationModel::all(); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al obtener las tareas: " . $error;
        }
    }

    public static function createAccomodation(AccomodationModel $Accomodation){
        try{
            $Accomodation->add();
            //redireccionar a una vista
            header('Location: ../views/listAccomodations.php');
        }catch(Error $error){
            return "Error al guardar los datos " . $error;
        }
    }

    public static function findAccomodationByUserID(){
        try{
            //ORM => (Mapeo-Objeto-Relacional)
            //find() => encontrar un registro en base a un ID
            $list_accomodations = BookingsModel::findByUserId(); //metodo mapeado
            return $list_accomodations;
        }catch(Error $error){
            return "Error al obtener las tareas: " . $error;
        }
    }

}