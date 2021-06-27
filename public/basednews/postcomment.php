<?php
require("php/database.php");
require("php/head.php");
require("php/header.php");
$sql = "INSERT INTO `comments`(`artikel_id`, `datum`, `tijd`, `naam`, `bericht`) VALUES ('" . $_GET['artikel'] . "','" . date("Y/d/m") . "','" . date('H:i:s', time() + 7200) . "','" . $_POST['commentname'] . "','" . $_POST['bericht'] . "')";
if(strlen($_POST['commentname']) < 30){
    if(strlen($_POST['bericht']) < 1000){
    $records = mysqli_query($DBverbinding, $sql);
    echo "<meta http-equiv='refresh' content='1; URL=artikel.php?artikel=" . $_GET['artikel'] . "'>";
    echo "<p style='margin-left: 20px;'>Comment geplaatst!</p>";
    }
    else{
            echo "<p style='margin-left: 20px;'>Sorry, je bericht mag maximaal 1000 karakters zijn</p>";
            echo "<a href='index.php'><p style='margin-left: 20px;'>terug naar home</p></a>";
    }
}
else{
    echo "<p style='margin-left: 20px;'>Sorry, je naam mag maximaal 30 karakters zijn</p>";
    echo "<a href='index.php'><p style='margin-left: 20px;'>terug naar home</p></a>";
}


?>