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


if ($_FILES["headlinefoto"]["size"] > 500000) {
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

include("php/database.php");
$sql = "SELECT MAX(id) FROM berichten";
$records = mysqli_query($DBverbinding, $sql);
$nieuwste_artikel;
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $nieuwste_artikel = $dbid['MAX(id)'];
    }
}

$sql1 = "INSERT INTO `berichten`(`id`, `headline`, `auteur`, `bericht`, `datum`, `image`) VALUES (";
$sql2 =  $nieuwste_artikel + 1 . ",'" . $_POST['headline'] . "','" . $_SESSION['gebruiker'] . "','" . $_POST['bericht'] . "','" . date("Y/d/m") . "', 'img/" . basename($_FILES["headlinefoto"]["name"]) . "')";
$sql = $sql1 . $sql2;
if($uploadOk == 1){
if ($DBverbinding->query($sql) === TRUE) {
    echo "<p style='margin-left: 10px;'>Artikel is geplaats!!</p>";
} else {
    echo "<p style='margin-left: 10px;'>Error: " . $sql . "" . $DBverbinding->error . "</p>";
}
}

?>