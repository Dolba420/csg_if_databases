<!DOCTYPE html>
<html>
<?php
require("php/head.php");
require("php/database.php");
?>

<body>

    <div class="header">
        <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360"></a>
        <div class="adminnav">
            <a class="red">Verwijder artikelen</a>
            <a>Nieuw artikel</a>
        </div>
    </div>
    <br>
    <h1 style="text-align: center;">Klik om te verwijderen</h1>
    <?php
    session_start();


    ?>

    <?php
    if (isset($_SESSION['gebruiker'])) {
        $sql = "SELECT * FROM berichten ORDER BY id DESC";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while($dbid = mysqli_fetch_assoc($records)) {
        echo '<a href="delete.php?=' . $dbid["id"] . '"><div class="deleteartikel"></a><img class="lijstimage" src="img/delete.png"><div class="lijstinfo">';
        echo '<h3>' . $dbid["headline"] . '</h3><p>Geschreven door: ' . $dbid["auteur"] . ' op ' . $dbid["datum"] . '</p></div></div></a><br>';
    }
}
    }
    else {
        echo "Log eem in jung";
    }
    ?>