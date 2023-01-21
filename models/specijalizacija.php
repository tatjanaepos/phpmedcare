<?php

class Specijalizacija{

    public $specijalizacijaID;
    public $naziv;


    public function __construct($specijalizacijaID=null,$naziv=null)
    {
        $this->specijalizacijaID=$specijalizacijaID;
        $this->naziv=$naziv;
    }

    public static function vrati(mysqli $konekcija)
    {
        $query = "SELECT * FROM specijalizacije";
        $resultSet = $konekcija->query($query);
        $specijalizacije = [];
        while($specijalizacija = $resultSet->fetch_object()){
            $specijalizacije[] = $specijalizacija;
        }
        return $specijalizacije;
    }

}

