<?php

require "baza.php";
require "models/korisnik.php";

$poruka = "";

session_start();

if(isset($_POST['prijava'])){
    $korisnickoIme = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];

    $korisnik = new Korisnik('', $korisnickoIme, $lozinka);
    $odg = Korisnik::login($korisnik, $konekcija);
    
    if($odg->num_rows==1){
        $_SESSION['user_id'] = $korisnik->ID;
        setcookie("korisnik", $korisnik->korisnickoIme, time() + 5*60*60);
        header('Location: index.php');
        exit();
    }else{
        $poruka="Pogrešno korisničko ime ili lozinka!";
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

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <br><br><br>
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 mb-4">MedCare &#x2764;	</h1>
        <h3 class="text-primary"><?= $poruka; ?></h3>
    </div>
    <div class="login-form">
        <div class="main-div">
            <form method="post" action="">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h3 id="poruka" style="color: white !important;"><?= $poruka; ?></h3>
            </div>
                <div class="container-xxl py-5"><center>
                    <label class="korisnickoIme">Korisničko ime</label>
                    <input type="text" name="korisnickoIme" class="form-control" required>
                    <br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" class="form-control" required>
                    <br>
                    <button type="submit" id="btnF" class="form-control btn-warning" name="prijava" style="width:20%">Prijavi se</button>
                </div></center>

            </form>
        </div> 
    </div>
    <div class="footerLogo1"></div>
</body>
</html>