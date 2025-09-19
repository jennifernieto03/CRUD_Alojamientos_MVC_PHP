<?php

require_once "../models/Accomodation_Model.php";

interface ICRUDAccomodation{
    public static function getAccomodation();
    public static function createAccomodation(Accomodation_Model $Accomodation);
}