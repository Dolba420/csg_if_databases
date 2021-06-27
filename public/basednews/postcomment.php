<?php
require("php/database.php");
require("php/head.php");
require("php/header.php");

$sql = "SELECT MAX(commentid) FROM comments";
$records = mysqli_query($DBverbinding, $sql);
$nieuwste_artikel;
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $nieuwste_comment = $dbid['MAX(commentid)'];
    }
}
$nieuwste_comment = $nieuwste_comment +1;

$sql = "INSERT INTO `comments`(`commentid`,`artikel_id`, `datum`, `tijd`, `naam`, `bericht`) VALUES ('" . $nieuwste_comment . "','" . $_GET['artikel'] . "','" . date("Y/d/m") . "','" . date('H:i:s', time() + 7200) . "','" . $_POST['commentname'] . "','" . $_POST['bericht'] . "')";
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