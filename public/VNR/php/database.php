<?php
$check = $check.'database.php geladen.';
$servernaam = "localhost";
$gebruikersnaam = "username";
$wachtwoord = "password";
$database = "dart_spelers";
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);

if (!$DBverbinding) {
    die("connectie database mislukt: " . mysqli_connect_error());
}
else {
    $check = $check.'connectie database gelukt.';
}
