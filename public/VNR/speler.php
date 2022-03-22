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
$allegame = array();
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
            array_push($allegame, $dbid["game_id"]);
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
<h1 class="header">Vorige spellen</h1>

<?php



    $sql = "SELECT DISTINCT  game_id FROM worp WHERE speler = '" . $_SESSION['username'] . "'";
    $records = mysqli_query($DBverbinding, $sql);
    if (mysqli_num_rows($records) > 0) {
        
        $x = count($allegame) - 1;
        while($x >= 0){
            $legs = array();
            $naam = array();
            $class;
            $datum;
            $spelsoort;
            $lost = 0;
            $won = 0;
            $vs = 'vs';
            $sql = "SELECT DISTINCT  speler FROM worp WHERE game_id = " . $allegame[$x];
            $records = mysqli_query($DBverbinding, $sql);
            if (mysqli_num_rows($records) > 0) {
                while ($dbid = mysqli_fetch_assoc($records)) {
                    array_push($naam, $dbid["speler"]);
                }
            }
            $sql = "SELECT DISTINCT datum FROM worp WHERE game_id = " . $allegame[$x];
            $records = mysqli_query($DBverbinding, $sql);
            if (mysqli_num_rows($records) > 0) {
                while ($dbid = mysqli_fetch_assoc($records)) {
                    $datum = $dbid['datum'];
                }
            }
            $sql = "SELECT DISTINCT spelsoort FROM worp WHERE game_id = " . $allegame[$x] . " AND NOT spelsoort = 'Classic 501legwin'";
            $records = mysqli_query($DBverbinding, $sql);
            if (mysqli_num_rows($records) > 0) {
                while ($dbid = mysqli_fetch_assoc($records)) {
                    $spelsoort = $dbid['spelsoort'];
                    
                }
            }

            if($spelsoort == '125 uitgooienlegwin' OR $spelsoort == '125 uitgooienleglose' OR $spelsoort == '125 uitgooien'){
                $spelsoort = "125 Uitgooien";
                $win = 'Gewonnen';
                $sql = "SELECT COUNT(spelsoort) FROM worp WHERE game_id = " . $allegame[$x] . " AND spelsoort = '125 uitgooienleglose' ";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        $lost = $dbid['COUNT(spelsoort)'];
                    }
                }
                $sql = "SELECT COUNT(spelsoort) FROM worp WHERE game_id = " . $allegame[$x] . " AND spelsoort = '125 uitgooienlegwin' ";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        $won = $dbid['COUNT(spelsoort)'];
                    }
                }
                if($won > $lost){
                    $win = 'Gewonnen';
                }
                if($won < $lost){
                    $win = 'Verloren';
                }

                echo '<a href="ziegame.php?game=' . $allegame[$x] . '"><div class="potje' . $win . '">
                <div class="horizontaal">
                <h2 class="tegen">' . $naam[0] . ' && ' . $naam[1] . ' (' . $win . ')</h2><h2 class="date">' . $datum . '</h2>
                </div>
                <h3 class="tegen">' . $spelsoort . '</h3>
            </div></a>';
            }
            if($spelsoort == 'Classic 501'){
                $sql = "SELECT COUNT(speler) FROM worp WHERE game_id = " . $allegame[$x] . " AND speler = '" . $naam[0] . "' AND (spelsoort = 'Classic 501legwin' OR spelsoort = '125 uitgooienlegwin')";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        array_push($legs, $dbid['COUNT(speler)']);
                    }
                }
                $sql = "SELECT COUNT(speler) FROM worp WHERE game_id = " . $allegame[$x] . " AND speler = '" . $naam[1] . "' AND (spelsoort = 'Classic 501legwin' OR spelsoort = '125 uitgooienlegwin')";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        array_push($legs, $dbid['COUNT(speler)']);
                    }
                }
            }

            if(count($legs) <= 1 || count($naam) <= 1){
                $x--;
            }
            else{
                
            if($legs[0] > $legs[1] AND $naam[0] == $_SESSION['username']){
                $win = 'Gewonnen';
            }
            else if($legs[0] < $legs[1] AND $naam[0] == $_SESSION['username']){
                $win = 'Verloren';
            }
            else if($legs[0] > $legs[1] AND $naam[1] == $_SESSION['username']){
                $win = 'Verloren';
            }
            else if($legs[0] < $legs[1] AND $naam[1] == $_SESSION['username']){
                $win = 'Gewonnen';
            }
            if($legs[0] == $legs[1]){
                $win = 'Gelijkspel';
            }
            echo '<a href="ziegame.php?game=' . $allegame[$x] . '"><div class="potje' . $win . '">
            <div class="horizontaal">
            <h2 class="tegen">' . $naam[0] . ' Vs. ' . $naam[1] . ' (' . $win . ')</h2><h2 class="date">' . $datum . '</h2>
            </div>
            <h3 class="tegen">' . $spelsoort . '</h3>
        </div></a>';
            $x--;
        }
        }
    }
    else{
        echo "<h2>Geen eerdere spellen.</h2>";
    }

?>
<br><br><br><br>
            </div>
            </div>
        </div>
</div>
</div>


</html>