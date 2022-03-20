<?php
require 'php/database.php';

$sql = "SELECT * FROM `login` WHERE gebruikersnaam = '" . $_POST['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    echo "Gebruiker bestaat al.";
    echo '<head><meta http-equiv="refresh" content="2;url=maakaccount.php" /></head>';
}
else{
    $sql = 'INSERT INTO `login`(`gebruikersnaam`, `wachtwoord`) VALUES ("' . $_POST['username'] . '","' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '")';
    $records = mysqli_query($DBverbinding, $sql);
    $_SESSION["username"] = $_POST['username'];
    echo "Nieuw account aangemaakt! U wordt doorverwezen.";
    echo '<head><meta http-equiv="refresh" content="2;url=dashboard.php" /></head>';
    $sql = 'INSERT INTO `elo`(`naam`, `rating501`, `rating125`) VALUES ("' . $_POST['username'] . '",1000,1000)';
    $records = mysqli_query($DBverbinding, $sql);
}


?>