<?php
require 'database.php';
$sql = "INSERT INTO `worp`(`game_id`, `worp_id`, `speler`, `worp_waarde`, `worpsoort`, `datum`) VALUES ('" . $_GET["game"] . "','" . $_GET["worp"] . "','" . $_GET["speler"] . "','" . $_GET["aantal"] . "','" . $_GET["worpsoort"] . "','" . date("d/m/Y") . "')";
$records = mysqli_query($DBverbinding, $sql);

?>