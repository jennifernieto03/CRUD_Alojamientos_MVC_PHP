<?php

class BookingsModel{
    
    public $id_booking;
    public $id_accomodation;
    public $name;
    public $email;
    public $date;
    public $nights;

    public function __construct($id_accomodation, $name, $email, $date, $nights)
    {
        $this->id_accomodation = $id_accomodation;
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
        $this->nights = $nights;
    }

}