<?php

require_once "../models/Accomodation_Model.php";
require_once "../models/Bookings_Accomodation_Model.php";
require_once "../models/Bookings_Model.php";

interface ICRUDAccomodations{
    public static function getAccomodation();
    public static function createAccomodation(AccomodationModel $Accomodation);
    public static function findAccomodationByUserID(Bookings_AccomodationModel $Bookings_accomodation);
    public static function deleteByBookingID(BookingsModel $Bookings);
}