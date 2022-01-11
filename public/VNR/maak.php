<?php
require 'php/database.php';

$sql = "SELECT * FROM `login` WHERE gebruikersnaam = '" . $_POST['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    echo "Gebruiker bestaat al.";
}
else{
    $sql = 'INSERT INTO `login`(`gebruikersnaam`, `wachtwoord`) VALUES ("' . $_POST['username'] . '","' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '")';
    $records = mysqli_query($DBverbinding, $sql);
}


?>