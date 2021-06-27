<?php
session_start();
require("php/head.php");
require("php/header.php");

//code gevonden op W3 schools
if($_POST['headline'] != "" && $_POST['bericht'] != ""){
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["headlinefoto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["headlinefoto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<p style='margin-left: 10px;'>Het bestand is geen foto </p>";
        $uploadOk = 0;
    }
}


if (file_exists($target_file)) {
    echo "<p style='margin-left: 10px;'>Sorry, de foto bestaat al </p>";
    $uploadOk = 0;
}


if ($_FILES["headlinefoto"]["size"] > 5000000) {
    echo "<p style='margin-left: 10px;'>De foto is te groot</p>";
    $uploadOk = 0;
}





if ($uploadOk == 0) {
    
} else {
    if (move_uploaded_file($_FILES["headlinefoto"]["tmp_name"], $target_file)) {

    } else {
        echo "<p style='margin-left: 10px;'>Sorry, er is iets misgegaan tijdens het uploaden</p>";
    }
}
}
else{
    echo "<p style='margin-left: 10px;'>Je moet wel wat in het artikel schrijven</p>";
}
list($width, $height) = getimagesize($target_file);
$htowratio = $height/$width;
if($htowratio > 1.1 || $htowratio < 0.6){
    echo "<p style='margin-left: 10px;'>foto heeft een te oneven vorm. zorg dat de hoogte gedeeld door de lengte tussen de 0.6 en 1.1 zit</p>";
    unlink($target_file);
    $uploadOk = 0;
}
if(strlen($_POST['headline']) > 60){
    echo "<p style='margin-left: 10px;'>De titel mag maximaal 60 karakters lang zijn</p>";
    $uploadOk = 0;
}

include("php/database.php");
$sql = "SELECT MAX(id) FROM berichten";
$records = mysqli_query($DBverbinding, $sql);
$nieuwste_artikel;
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $nieuwste_artikel = $dbid['MAX(id)'];
    }
}else{
    $nieuwste_artikel = 0;
}
$bericht = str_replace("'", '', $_POST['bericht']);
$titel = str_replace("'", '', $_POST['headline']);
$sql1 = "INSERT INTO `berichten`(`id`, `headline`, `auteur`, `bericht`, `datum`, `image`) VALUES (";
$sql2 =  $nieuwste_artikel + 1 . ",'" . $titel . "','" . $_SESSION['gebruiker'] . "','" . $bericht . "','" . date("Y/d/m") . "', 'img/" . basename($_FILES["headlinefoto"]["name"]) . "')";
$sql = $sql1 . $sql2;
if($uploadOk == 1){
if ($DBverbinding->query($sql) === TRUE) {
    echo "<p style='margin-left: 10px;'>Artikel is geplaatst!!</p>";
} else {
    echo "<p style='margin-left: 10px;'>Error: " . $sql . "" . $DBverbinding->error . "</p>";
} 
}
else{
    echo "<p style='margin-left: 10px;'>er is iets misgegaan</p>";
}

?>