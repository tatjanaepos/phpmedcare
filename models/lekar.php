<?php

class Lekar{

    public $lekarID;
    public $ime;
    public $prezime;
    public $specijalizacijaID;

    
    public function __construct($lekarID=null,$ime=null,$prezime=null,$specijalizacijaID=null)
    {
        $this->lekarID=$lekarID;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->specijalizacijaID=$specijalizacijaID;
    }

    public static function vrati(mysqli $konekcija)
    {
        $query = "SELECT * FROM lekari l join specijalizacije s on l.specijalizacijaID=s.specijalizacijaID";
        $resultSet = $konekcija->query($query);
        $lekari = [];
        while($lekar = $resultSet->fetch_object()){
            $lekari[] = $lekar;
        }
        return $lekari;
    }

}

