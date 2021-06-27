<!DOCTYPE html>
<html>
<head>
    <title>Based News</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel='icon' href='logo/based.ico' type='image/x-icon'>
<style>
h1{
    margin-left: 10px;
}
a{
    margin-left: 10px;
}
</style>
</head>

<?php
require("php/database.php");
?>

<body>

<?php
require("php/header.php");
?>
    

    <?php
    session_start();

    ?>

    <?php
    if (isset($_GET['art']) && isset($_SESSION['gebruiker']) && isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'ja') {
            $sql = 'SELECT * FROM `berichten` WHERE id=' . $_GET['art'];
            $records = mysqli_query($DBverbinding, $sql);
            if (mysqli_num_rows($records) == 1) {
                while ($dbid = mysqli_fetch_assoc($records)) {
                    unlink(realpath($dbid["image"]));
                }
            $sql = 'DELETE FROM `berichten` WHERE id=' . $_GET['art'];
            $records = mysqli_query($DBverbinding, $sql);
            echo "<h1>Verwijderd!</h1>";
            echo "<a href='index.php'>Ga terug naar homepagina</a>";
            }

        } else {
            echo "<a href='index.php'>Ga terug naar homepagina</a>";
        }
    } else if (isset($_GET['art']) && isset($_SESSION['gebruiker'])) {

        $sql = "SELECT * FROM berichten " . "WHERE id=" . $_GET['art'];
        $records = mysqli_query($DBverbinding, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                echo '<div style="text-align: center;">';
                echo '<h1> weet je zeker dat je het artikel: ' . $dbid["headline"] . " wil verwijderen</h1>";
                echo '<a href="delete.php?art=' . $_GET['art'] . "&confirm=ja" .  '"><input type="button" value="Ja"></a>';
                echo '<a href="delete.php?art=' . $_GET['art'] . "&confirm=nee" .  '"><input type="button" value="Nee"></a>';
                echo '</div>';
            }
        }
    } else if (isset($_SESSION['gebruiker'])) {
        echo '<h1 style="text-align: center;">Klik om te verwijderen</h1>';
        $sql = "SELECT * FROM berichten ORDER BY id DESC";
        $records = mysqli_query($DBverbinding, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                echo '<a style="text-decoration: none;" href="delete.php?art=' . $dbid["id"] . '"><div class="deleteartikel"><div class="lijstinfo">';
                echo '<h3>' . $dbid["headline"] . '</h3><p>Geschreven door: ' . $dbid["auteur"] . ' op ' . $dbid["datum"] . '</p></div></div></a>';
            }
        }
    } else {
        echo "Log eem in jung";
    }
    ?>