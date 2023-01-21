<?php
include "baza.php";
require "models/lekar.php";

$lekari = Lekar::vrati($konekcija);      

foreach ($lekari as $lekar){
    ?>
    <option value="<?= $lekar->lekarID?>"><?= $lekar->ime . " " . $lekar->prezime . " ( " . $lekar->naziv . " )" ?> </option>
    <?php
}
?>