<?php
require("php/database.php");

$sql = "INSERT INTO `comments`(`artikel_id`, `datum`, `naam`, `bericht`) VALUES ('" . $_GET['artikel'] . "','" . date("Y/d/m") . " " . date("G:i") . "','" . $_POST['commentname'] . "','" . $_POST['bericht'] . "')";
$records = mysqli_query($DBverbinding, $sql);

?>