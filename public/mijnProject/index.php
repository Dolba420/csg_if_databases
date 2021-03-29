<?php
error_reporting(E_ALL & ~E_NOTICE);
require('php/database.php');

//maak databaseverbinding met de gegevens uit database.php
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);
// Controleer de verbinding
if (!$DBverbinding) {
// Geef de foutmelding die de server teruggeeft en stop met de uitvoer van PHP (die)
die("Verbinding mislukt: " . mysqli_connect_error());
}
else {
// Dit gedeelte laat je normaliter weg, maar is hier ter illustratie toegevoegd
echo '<i>verbinding database succesvol</i>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Startpagina</title>
        <link rel="stylesheet" type="text/css" href="css/design.css">
    </head>
    <body>
        <div id="container">
            <h1>
                <?php echo 'een <strong>klein</strong> stukje PHP';?>
            </h1>
            <img src="images/cartoon.jpg">
        </div>
    </body>
</html>