<?php

class Korisnik{
    
    public $ID;
    public $korisnickoIme;
    public $lozinka;

    public function __construct($ID=null,$korisnickoIme=null,$lozinka=null)
    {
        $this->ID = $ID;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
    }
    
    public static function login($korisnik, mysqli $konekcija)
    {
        $query = "SELECT * FROM korisnici WHERE korisnickoIme='$korisnik->korisnickoIme' and lozinka='$korisnik->lozinka'";
        $korisnik = $konekcija->query($query);
        return $korisnik;
    }

}

?>