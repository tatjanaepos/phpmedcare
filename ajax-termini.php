<?php
include "baza.php";
require "models/termin.php";

$termini = Termin::vrati("sve","asc",$konekcija);      

foreach ($termini as $termin){
    ?>
    <option value="<?= $termin->ID ?>"><?= $termin->pacijent . " ( " . date("d/m/Y", strtotime($termin->datum)) . " )" ?> </option>
    <?php
}
?>