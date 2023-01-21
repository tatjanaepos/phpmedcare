<?php
include "baza.php";
require "models/termin.php";

$spec = trim($_GET['spec']);
$datum = trim($_GET['datum']);

$termini = Termin::vrati($spec,$datum,$konekcija); 

?>

<table class="table">
    <thead>
        <tr>
            <th style="width: 25%">Pacijent</th>
            <th style="width: 25%">Lekar</th>
            <th style="width: 25%">Datum</th>
            <th style="width: 25%">Specijalizacija</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($termini as $termin){
    ?>
    <tr>
        <td><?= $termin->pacijent?></td>
        <td><?= $termin->ime . " " . $termin->prezime?></td>
        <td><?= date("d/m/Y", strtotime($termin->datum))?></td>
        <td><?= $termin->naziv?></td>
    
    </tr>
<?php
}
?>
    </tbody>
</table>

