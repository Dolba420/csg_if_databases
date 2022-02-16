<?php
require 'database.php';
$sql = "INSERT INTO `worp`(`game_id`, `worp_id`, `speler`, `worp_waarde`, `datum`) VALUES ('" . $_GET["game"] . "','" . $_GET["worp"] . "','" . $_GET["speler"] . "','" . $_GET["aantal"] . "','" . date("d/m/Y") . "')";
$records = mysqli_query($DBverbinding, $sql);

?>