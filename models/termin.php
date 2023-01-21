<?php

class Termin{

   public $ID;
   public $pacijent;
   public $lekarID;
   public $datum;

    public function __construct($ID=null, $pacijent=null, $lekarID=null, $datum=null)
    {
        $this->ID = $ID;
        $this->pacijent = $pacijent;
        $this->lekarID = $lekarID;
        $this->datum = $datum;
    }

    public static function vrati($specijalizacija, $datum, mysqli $konekcija)
    {
        $query = "SELECT * FROM termini t join lekari l on t.lekarID = l.lekarID join specijalizacije s on l.specijalizacijaID = s.specijalizacijaID";
        if($specijalizacija != "sve"){
            $query .= " WHERE l.specijalizacijaID = " . $specijalizacija;
        }
        $query.= " ORDER BY t.datum " . $datum;
        $resultSet = $konekcija->query($query);
        $termini = [];
        while($termin = $resultSet->fetch_object()){
            $termini[] = $termin;
        }
        return $termini;
    }

    public static function dodaj($pacijent, $lekar, $datum, mysqli $konekcija)
    {
        $query = "INSERT INTO termini VALUES(null, '$pacijent','$lekar','$datum')";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function izmeni($terminID, $datum, mysqli $konekcija)
    {
        $query = "UPDATE termini SET datum = '$datum' WHERE ID = $terminID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function obrisi($terminID, mysqli $konekcija)
    {
        $query = "DELETE FROM termini WHERE ID = $terminID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }
}