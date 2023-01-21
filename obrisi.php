<?php
include "baza.php";
require "models/termin.php";

$poruka = "";
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['obrisi'])){

    $termin = trim($_POST['termin']);

    if(Termin::obrisi($termin, $konekcija)){
        $poruka = "Uspešno obrisan termin";
    }else{
        $poruka = "Došlo je do greške";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MedCare</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj termin</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmeni termin</a>
                <a href="obrisi.php" class="nav-item nav-link">Obriši termin</a>
            </div>
        </div>
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-4">MedCare &#x2764;	</h1>
                <h3 class="text-primary"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="termin">Odaberite termin</label>
                    <select id="termin" name="termin" class="form-control"></select>
                    <hr/>
                    <button type="submit" id="btnF" class="form-control btn-warning" name="obrisi">Obrisi</button>

                </form>
            </div>
            <br/>
            <br/>
            <br/>

        </div>
    </div>

    <div class="footerLogo"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script>
        function popuniTermine() {
            $.ajax({
                url: 'ajax-termini.php',
                success: function (data) {
                $("#termin").html(data);
                }
            });
        }
        popuniTermine();

    </script>

</body>

</html>
