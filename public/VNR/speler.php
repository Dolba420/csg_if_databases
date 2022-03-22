<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="css/css.css">

</head>

<?php
require('php/logincheck.php');
?>
<?php
require('php/logincheck.php');
$sql = "SELECT `naam`, `rating501` FROM `elo` WHERE naam = '" . $_SESSION['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s1rating = $dbid['rating501'];
    }
}
$sql = "SELECT DISTINCT  game_id, speler FROM worp WHERE speler = '" . $_GET['speler'] . "' OR speler = '" . $_SESSION['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    $extraquery = " AND ( ";
    while ($dbid = mysqli_fetch_assoc($records)) {
        if($vorigegame == $dbid['game_id']){
            $extraquery = $extraquery . "game_id = " . $dbid['game_id'] . " OR ";
        }
        $vorigegame = $dbid['game_id'];
    }
    $extraquery = $extraquery . "1 = 2)";
}

?>

<nav><h3 class="username"><?php echo $_SESSION['username'] . ' (' . $s1rating . ')';?> </h3></nav>
<div class="container">
<?php
include 'php/moduscontainer.php';
?>
<div class="scherm">
        <div class="statistiekenscherm">
            <div class="profielcontent">
                <div id="profielcontentinner" class="profielcontentinner">
            <h1 class="header"><?php echo "Gemiddelde " . $_SESSION['username'] . " VS " .  $_GET['speler']; ?></h1>
            <table>
                <tr>
                <th>Soort</th>
                <th>Gemiddelde</th>
            </tr>
            <tr>
                <td>Gemiddelde per drie darts</td>
                <td id="gemiddelde"><?php
                $sql = "SELECT ROUND(AVG(worp_waarde),2) AS Averageworp FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')" . $extraquery;
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["Averageworp"];
                    }
                }
                else{
                    echo 0;
                }
                
                ?></td>
            </tr>
            <tr onclick="chart(1)">
            
                <td>Eerste negen darts gemiddelde</td>
                <td id="eerste9"><?php
                $sql = "SELECT ROUND(AVG(worp_waarde),2) AS Averageworp FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin') AND worpsoort = 'eerste9' " . $extraquery;
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["Averageworp"];
                    }
                }
                else{
                    echo 0;
                }
                
                ?></td>
            </tr>
            <tr>

                <td>aantal keer 100+ gegooid</td>
                <td id="honderdplus"> <?php


                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde > 100 AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')" . $extraquery;
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["count(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
            <tr>
                <td>aantal keer 140+ gegooid</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde > 140 AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')" . $extraquery;
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["count(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
            <tr>
                <td>aantal keer 180 gegooid</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde = 180 AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')" . $extraquery;
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["count(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
            <td>Hoogste checkout</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT MAX(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worpsoort = 'uitgooi' AND  spelsoort = 'Classic 501legwin'" . $extraquery;
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["MAX(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
</table>

            </div>
            </div>
        </div>
</div>
</div>


</html>