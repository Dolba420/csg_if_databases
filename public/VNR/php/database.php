<?php
session_start();
$check = $check.'database.php geladen.';
$servernaam = "localhost";
$gebruikersnaam = "username";
$wachtwoord = "password";
$database = "project";
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);

if (!$DBverbinding) {
    die("connectie database mislukt: " . mysqli_connect_error());
}
else {
    $check = $check.'connectie database gelukt.';
}
