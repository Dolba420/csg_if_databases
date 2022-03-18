<html>
<head>
<?php
require('php/logincheck.php');
?>
    <link rel="stylesheet" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
<div id="spelerkeuze">
    <div class="topbar">
<h1>Wie gooide het dichts bij de Bullseye</h1>
</div>
<div class="startspeler" id="startspeler">
    <div class="speler1" onclick="startspeler(0)">
        <h1 class="spelertekst"><?php echo $_SESSION['username']; ?></h1>
    </div>
    <div class="speler2" onclick="startspeler(1)">
    <h1 class="spelertekst"><?php echo $_POST['tegenstander']?></h1>
    </div>
</div>
</div>
<div id="spelgestart" hidden="hidden">
    <div class="topbar">
    <a href="dashboard.php" class="terugnaarhoofdmenu"><h2>Terug naar hoofdmenu</h2></a>
    <h1>Uitgooien</h1>
    </div>
    <div class="gezamelijkescore">
    <h1 id="score0" class="spelerscore">125</h1>
    <div class="horizontaal">
            <h2 id="speler1" class="spelernaamlinks"><?php echo " " . $_SESSION['username'] . " "; ?></h2>
            <h2 id="speler2" class="spelernaamrechts"><?php echo " " . $_POST['tegenstander'] . " "; ?></h2>
    </div>
            <h3 id="uitgooi0" class="spelergem">T18 T13 D16</h3>
    </div>

    <br>
    <div class="">
    <input type="number" id="puntengegooid" min="1" max="180" value="" placeholder=" aantal punten gegooid">
    <input type="button" id="okbutton" value="Ok" onclick="geworpen();">
</div>
</div>

<div class="win" id="win" hidden="hidden">
    <h1 id="winmessage">GEWONNEN</h1>
    <video width="320" height="240" id="videoplay" controls loop id="winfilm">
  
</video>
<br><br><br>
<input type="button" value="Speel opniew met zelfde instellingen" onclick="restart();">
<a href="spelen.php">
<input type="button" value="Terug naar hoofdmenu">
</a>
</div>


<div class="win" id="lose" hidden="hidden">
    <h1 id="winmessage">VERLOREN</h1>
    <video width="320" height="240" id="videoplay" controls loop id="winfilm">
  
</video>
<br><br><br>
<input type="button" value="Speel opniew met zelfde instellingen" onclick="restart();">
<a href="spelen.php">
<input type="button" value="Terug naar hoofdmenu">
</a>
</div>



<!--
<table>
<?php 
echo "<table>";
    foreach ($_POST as $key => $value) {
        
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo "</table>";

?>
</table>
-->
<script>

var legworp = 0;
var worpsoort = ["125 uitgooien"];
var gemspeler = document.getElementById('gemspeler');
var gemtegenspeler = document.getElementById('gemtegenspeler');
var aantalbeurten1 = 0;
var aantalbeurten2 = 0;
var gemiddelde = [];
var som = [0];
var beurtarray = [];
var spelerbeurt = 0;
beurtarray[0] = document.getElementById('speler1');
beurtarray[1] = document.getElementById('speler2');
var worp = 0;
var legstotwin = <?php echo $_POST['legs']?>;
var stand = [125];
var scores = [125];
var legs = [0];
var aantalworpen = 0;
var beginspeler = null;
var gameid = <?php echo $_POST["gameid"]?>;
var spelers = [<?php echo "'" . $_SESSION['username'] . "'" . ",'" . $_POST['tegenstander'] . "'"; ?>];
var bspeler = Math.floor(Math.random()*2);
var std = 125;
var beginmodus = 
<?php
echo '"' . $_POST["begin"] . '"';
?>
;
var uitgooi = 
<?php
echo "{";
$sql = "SELECT * FROM uitgooi";
                    $records = mysqli_query($DBverbinding, $sql);
                    if (mysqli_num_rows($records) > 0) {
                        while ($dbid = mysqli_fetch_assoc($records)) {
                            echo "w" . $dbid["waarde"] . " : ";
                            echo "'" . $dbid["uitgooi"] . "',";
                        }
                    }
echo "};";
?>



if(beginmodus == "willekeurig"){
    document.getElementById("spelerkeuze").hidden = "hidden";
        document.getElementById("spelgestart").hidden = "";
        beginspeler = bspeler;
        spelerbeurt = bspeler * -1 + 1;
        beurt(spelerbeurt);
}
if(beginmodus == "ik"){
        document.getElementById("spelerkeuze").hidden = "hidden";
        document.getElementById("spelgestart").hidden = "";
        beginspeler = 0;
        spelerbeurt = 0 * -1 + 1;
        beurt(spelerbeurt);
}
if(beginmodus == "tegenstander"){
        document.getElementById("spelerkeuze").hidden = "hidden";
        document.getElementById("spelgestart").hidden = "";
        beginspeler = 1;
        spelerbeurt = 1 * -1 + 1;
        beurt(spelerbeurt);
}



    function startspeler(speler){
        document.getElementById("spelerkeuze").hidden = "hidden";
        document.getElementById("spelgestart").hidden = "";
        beginspeler = speler;
        spelerbeurt = speler * -1 + 1;
        beurt(speler);
    }


function beurt(speler){
    spelerbeurt = spelerbeurt * -1 + 1;
    beurtarray[0].className = "spelernaamlinks";
    beurtarray[1].className = "spelernaamrechts";
    beurtarray[spelerbeurt].className = "spelernaam" + spelerbeurt + "active";
}
function geworpen(){
    if(document.getElementById('puntengegooid').value > 180 || document.getElementById('puntengegooid').value == 169 || document.getElementById('puntengegooid').value == 168 || document.getElementById('puntengegooid').value == 166 || document.getElementById('puntengegooid').value == 165 || document.getElementById('puntengegooid').value == 163 || document.getElementById('puntengegooid').value == 162 || document.getElementById('puntengegooid').value == 159  || document.getElementById('puntengegooid').value % 1 !== 0 || document.getElementById('puntengegooid').value < 0) return;
    if((scores[0] - document.getElementById('puntengegooid').value) < 0){beurt(); aantalworpen++; document.getElementById('puntengegooid').value = ''; return;}
    if(scores[0] - document.getElementById('puntengegooid').value <= 0){beurt(); win(); return}
    if(aantalworpen == 2){lose(); return;}
    scores[0] = scores[0] - document.getElementById('puntengegooid').value;
    aantalworpen++;
    beurt();
    worp++;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {}
    xhttp.open("GET", "php/saveworp.php?game=" + gameid + "&worp=" + worp + "&speler=" + spelers[spelerbeurt] + "&aantal=" + document.getElementById('puntengegooid').value + "&worpsoort=125 uitgooien"  + "&spelsoort=125 uitgooien");
    xhttp.send();
    if(scores[0] < 170){
        document.getElementById("uitgooi0").innerHTML = uitgooi["w" + scores[0]];
    }
    document.getElementById('puntengegooid').value = '';
    document.getElementById('score0').innerHTML = scores[0];
   
}


function lose(){
    worp++;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {}
    xhttp.open("GET", "php/saveworp.php?game=" + gameid + "&worp=" + worp + "&speler=" + spelers[spelerbeurt] + "&aantal=" + document.getElementById('puntengegooid').value + "&worpsoort=125 uitgooien"  + "&spelsoort=125 uitgooienleglose");
    xhttp.send();
    aantalworpen = 0;
    std -= 2;
    scores[0] = std;
    if(scores[0] < 120){
        document.getElementById('spelgestart').hidden = "hidden";
        document.getElementById('lose').hidden = "";
    }
    document.getElementById('puntengegooid').value = '';
    document.getElementById('score0').innerHTML = scores[0];
    if(scores[0] < 170){
        document.getElementById("uitgooi0").innerHTML = uitgooi["w" + scores[0]];
    }

}

function win(){
    worp++;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {}
    xhttp.open("GET", "php/saveworp.php?game=" + gameid + "&worp=" + worp + "&speler=" + spelers[spelerbeurt] + "&aantal=" + document.getElementById('puntengegooid').value + "&worpsoort=125 uitgooien"  + "&spelsoort=125 uitgooienlegwin");
    xhttp.send();
    aantalworpen = 0;
    std += 2;
    scores[0] = std;
    if(scores[0] > 130){
        document.getElementById('spelgestart').hidden = "hidden";
        document.getElementById('win').hidden = "";
    }
    document.getElementById('puntengegooid').value = '';
    document.getElementById('score0').innerHTML = scores[0];
    if(scores[0] < 170){
        document.getElementById("uitgooi0").innerHTML = uitgooi["w" + scores[0]];
    }
    
}


function restart(){
    document.getElementById("win").hidden = "hidden";
    document.getElementById("lose").hidden = "hidden";
    document.getElementById("videoplay").pause();
    legs[0] = 0;
    worp = 0;
    std = 125;
    scores[0] = 125;
    gameid++;
    document.getElementById("uitgooi0").innerHTML = uitgooi["w" + scores[0]];
    document.getElementById('puntengegooid').value = '';
    document.getElementById('score0').innerHTML = 125;
    document.getElementById("spelerkeuze").hidden = "";

}


var input = document.getElementById("puntengegooid");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("okbutton").click();
  }
});




</script>

</body>
</html>
