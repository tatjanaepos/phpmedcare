<?php
include "baza.php";

$poruka = "";
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_COOKIE["korisnik"])){
    $poruka=$_COOKIE["korisnik"];
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

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5">
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
                <div class="col-md-6">
                    <label for="spec">Specijalizacija</label>
                    <select class="form-control" id="spec">
                        <option value="sve">Sve specijalizacije</option>
                        <option value="1">Pedijatrija</option>
                        <option value="2">Kardiologija</option>
                        <option value="3">Pulmologija</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="datum">Datum</label>
                    <select class="form-control" id="datum">
                        <option value="asc">Rastuće</option>
                        <option value="desc">Opadajuće</option>
                    </select>
                </div>

                <div class="cols-md-12" style="padding-top: 20px">
                    <button id="btnF" class="form-control btn-warning" onclick="pretrazi()">Prikaži</button>
                </div>
            </div>
            <div class="row g-4" id="rezultat" style="margin-top:30px" >

            </div>
        </div>
    </div>

    <div class="footerLogo1"></div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function pretrazi() {
            let spec = $("#spec").val();
            let datum = $("#datum").val();

            $.ajax({
                url: 'ajax-pretraga.php',
                data: {
                    spec: spec,
                    datum: datum
                },
                success: function (data) {
                    $("#rezultat").html(data);
                }
            });
        }
    </script>
</body>

</html>