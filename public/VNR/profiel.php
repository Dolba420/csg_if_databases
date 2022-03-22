<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="css/css.css">

</head>

<?php
require('php/logincheck.php');
$sql = "SELECT `naam`, `rating501` FROM `elo` WHERE naam = '" . $_SESSION['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s1rating = $dbid['rating501'];
    }
}
?>

<nav><h3 class="username"><?php echo $_SESSION['username'] . ' (' . $s1rating . ')';?></h3></nav>
<div class="container">
<?php
include 'php/moduscontainer.php';
?>
<div class="scherm">
        <div class="statistiekenscherm">
            <div class="profielcontent">
                <div id="profielcontentinner" class="profielcontentinner">
            <h1 class="header">Statistieken Classic 501</h1>
            <table>
                <tr>
                <th>Soort</th>
                <th>Gemiddelde</th>
            </tr>
            <tr onclick="chart(0)">
                <td class="marked">Gemiddelde per drie darts</td>
                <td id="gemiddelde"></td>
            </tr>
            <tr onclick="chart(1)">
            
                <td class="marked">Eerste negen darts gemiddelde</td>
                <td id="eerste9"></td>
            </tr>
            <tr>
                <td>aantal keer 100+ gegooid</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde > 100 AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')";
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
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde > 140 AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')";
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
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde = 180 AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')";
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
                $sql = "SELECT MAX(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worpsoort = 'uitgooi' AND  spelsoort = 'Classic 501legwin'";
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
<canvas id="chart1" hidden="hidden"></canvas>
<h1 class="header">Statistieken 125 uitgooien</h1>
<table>
                <tr>
                <th>Soort</th>
                <th>Gemiddelde</th>
            </tr>
            <tr onclick="chart(2)">
                <td class="marked">Gemiddelde per drie darts</td>
                <td id="gemiddelde125"></td>
            </tr>
            <td>Hoogste checkout</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT MAX(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "'  AND spelsoort = '125 uitgooienlegwin'";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["MAX(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                //echo $sql;
                ?></td>
            </tr>
</table>
<canvas id="chart2" hidden="hidden"></canvas>
<h1 class="header">Vorige spellen</h1>

<?php
$allegame = array();


    $sql = "SELECT DISTINCT  game_id FROM worp WHERE speler = '" . $_SESSION['username'] . "'";
    $records = mysqli_query($DBverbinding, $sql);
    if (mysqli_num_rows($records) > 0) {
        while ($dbid = mysqli_fetch_assoc($records)) {
            array_push($allegame, $dbid["game_id"]);
        }
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
<br><br><br>
            </div>
            </div>
        </div>
</div>
<script>
var gemiddelde = document.getElementById("gemiddelde");
var gem125 = document.getElementById('gemiddelde125');
var alleworpen501 = <?php  
                    echo "[";
                    $sql = "SELECT * FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND (spelsoort = 'Classic 501' OR spelsoort = 'Classic 501legwin')";
                    $records = mysqli_query($DBverbinding, $sql);
                    if (mysqli_num_rows($records) > 0) {
                        while ($dbid = mysqli_fetch_assoc($records)) {
                            echo $dbid["worp_waarde"] . ",";
                        }
                    }
                    else{
                        echo 0;
                    }
                    echo "];";
            ?>
var eerste9 = <?php  
                    echo "[";
                    $sql = "SELECT * FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worpsoort = 'eerste9'";
                    $records = mysqli_query($DBverbinding, $sql);
                    if (mysqli_num_rows($records) > 0) {
                        while ($dbid = mysqli_fetch_assoc($records)) {
                            echo $dbid["worp_waarde"] . ",";
                        }
                    }
                    else{
                        echo 0;
                    }
                    echo "];";
            ?>



var someerste9 = 0;
for (var x = 0; x < eerste9.length; x++) {
    someerste9 += eerste9[x];
}
document.getElementById("eerste9").innerHTML =  Math.round((someerste9 / eerste9.length) * 100) / 100;


var somalleworpen = 0;
for (var x = 0; x < alleworpen501.length; x++) {
    somalleworpen += alleworpen501[x];
}
gemiddelde.innerHTML =  Math.round((somalleworpen / alleworpen501.length) * 100) / 100;


// 125 uitgooien
var alleworpen125 = <?php  
                    echo "[";
                    $sql = "SELECT * FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND (spelsoort = '125 uitgooien' OR spelsoort = '125 uitgooienlegwin')";
                    $records = mysqli_query($DBverbinding, $sql);
                    if (mysqli_num_rows($records) > 0) {
                        while ($dbid = mysqli_fetch_assoc($records)) {
                            echo $dbid["worp_waarde"] . ",";
                        }
                    }
                    else{
                        echo 0;
                    }
                    echo "];";
            ?>

var somalleworpen125 = 0;
for (var x = 0; x < alleworpen125.length; x++) {
    somalleworpen125 += alleworpen125[x];
}
gem125.innerHTML = Math.round((somalleworpen125 / alleworpen125.length) * 100) / 100;

var grafiek1 = document.getElementById('chart1');
var grafiekeen = grafiek1.getContext('2d');
grafiek1.width = (document.getElementById("profielcontentinner").clientWidth * 0.8);
grafiek1.height = (document.getElementById("profielcontentinner").clientWidth * 0.4);
var grafiek2 = document.getElementById('chart2');
var grafiektwee = grafiek2.getContext('2d');
grafiek2.width = (document.getElementById("profielcontentinner").clientWidth * 0.8);
grafiek2.height = (document.getElementById("profielcontentinner").clientWidth * 0.4);
function chart(p){

    if(p == 0){
        grafiekeen.lineWidth = 2;
        grafiekeen.clearRect(0,0,10000,10000);
        grafiekeen.beginPath();
        grafiekeen.strokeStyle = "#000000";
        grafiekeen.moveTo(-100,0);
        for(var x = 0; x < alleworpen501.length; x++){
        grafiekeen.lineTo((grafiek1.width / alleworpen501.length) * x , grafiek1.height - ((alleworpen501[x] - (Math.min(...alleworpen501) - 10)) * (grafiek1.height / ((Math.max(...alleworpen501)+10) - (Math.min(...alleworpen501) - 10)))));
        }
        grafiekeen.strokeStyle = "#CC3F0C";
        grafiekeen.font = "30px Arial";
        grafiekeen.fillText("Max : " + Math.max(...alleworpen501), grafiek1.width * 0.8, 30);
        grafiekeen.fillText("Min : " + Math.min(...alleworpen501), grafiek1.width * 0.8, grafiek1.height * 0.9);
        grafiekeen.fillText("Gemiddelde", 10, 50);
        grafiekeen.stroke();
        grafiek1.hidden = "";
    }
    if(p == 1){
        grafiekeen.lineWidth = 2;
        grafiekeen.clearRect(0,0,10000,10000);
        grafiekeen.beginPath();
        grafiekeen.strokeStyle = "#000000";
        grafiekeen.moveTo(-100,0);
        for(var x = 0; x < eerste9.length; x++){
            grafiekeen.lineTo((grafiek1.width / eerste9.length) * x , grafiek1.height - ((eerste9[x] - (Math.min(...eerste9) - 10)) * (grafiek1.height / ((Math.max(...eerste9) + 10) - (Math.min(...eerste9) - 10)))));
        }
        grafiekeen.strokeStyle = "#CC3F0C";
        grafiekeen.font = "30px Arial";
        grafiekeen.fillText("Max : " + Math.max(...eerste9), grafiek1.width * 0.8, 30);
        grafiekeen.fillText("Min : " + Math.min(...eerste9), grafiek1.width * 0.8, grafiek1.height * 0.9);
        grafiekeen.font = "30px Arial";
        grafiekeen.fillText("Gemiddelde eerste 9", 10, 50);
        grafiekeen.stroke();
        grafiek1.hidden = "";
    }
    if(p == 2){
        grafiektwee.lineWidth = 2;
        grafiektwee.clearRect(0,0,10000,10000);
        grafiektwee.beginPath();
        grafiektwee.strokeStyle = "#000000";
        grafiektwee.moveTo(-100,0);
        for(var x = 0; x < alleworpen125.length; x++){
        grafiektwee.lineTo((grafiek2.width / alleworpen125.length) * x , grafiek2.height - ((alleworpen125[x] - (Math.min(...alleworpen125) - 10)) * (grafiek2.height / ((Math.max(...alleworpen125) + 10) - (Math.min(...alleworpen125) - 10)))));
        }
        grafiektwee.strokeStyle = "#CC3F0C";
        grafiektwee.font = "30px Arial";
        grafiektwee.fillText("Max : " + Math.max(...alleworpen125), grafiek1.width * 0.8, 30);
        grafiektwee.fillText("Min : " + Math.min(...alleworpen125), grafiek1.width * 0.8, grafiek1.height * 0.9);
        grafiektwee.font = "30px Arial";
        grafiektwee.fillText("Gemiddelde", 10, 50);
        grafiektwee.stroke();
        grafiek2.hidden = "";
    }

}

</script>



</html>