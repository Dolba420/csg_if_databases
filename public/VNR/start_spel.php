<html>
<head>
<?php
require('php/logincheck.php');
?>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="css/css.css">
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
    <h1 id="stand">0 - 0</h1>
    </div>
    <div class="spelers">
        <div class="speler1spel" id="speler1">
            <h1 id="score0" class="spelerscore">501</h1>
            <h2 class="spelernaam"><?php echo $_SESSION['username']; ?></h2>
            <h3 id="gemspeler" class="spelergem"></h3>
            <h3 id="uitgooi0" class="spelergem"></h3>
        </div>
        <div class="speler2spel" id="speler2">
            <h1 id="score1" class="spelerscore">501</h1>
            <h2 class="spelernaam"><?php echo $_POST['tegenstander']?></h2>
            <h3 id="gemtegenspeler" class="spelergem"></h3>
            <h3 id="uitgooi1" class="spelergem"></h3>
        </div>
    </div>
    <br>
    <div class="">
    <input type="number" id="puntengegooid" min="1" max="180" value="" placeholder=" aantal punten gegooid">
    <input type="button" id="okbutton" value="Ok" onclick="geworpen();">
</div>
</div>

<div class="win" id="win" hidden="hidden">
    <h1 id="winmessage"></h1>
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
var audio = new Audio('media/heerlijk.mp3');
var legworp = 0;
var worpsoort = ["eerste9","eerste9"];
var gemspeler = document.getElementById('gemspeler');
var gemtegenspeler = document.getElementById('gemtegenspeler');
var aantalbeurten1 = 0;
var aantalbeurten2 = 0;
var gemiddelde = [];
var som = [0,0];
var beurtarray = [];
var spelerbeurt = 0;
beurtarray[0] = document.getElementById('speler1');
beurtarray[1] = document.getElementById('speler2');
var worp = 0;
var legstotwin = <?php echo $_POST['legs']?>;
var scores = [501, 501];
var legs = [0,0];
var beginspeler = null;
var gameid = <?php echo $_POST["gameid"]?>;
var spelers = [<?php echo "'" . $_SESSION['username'] . "'" . ",'" . $_POST['tegenstander'] . "'"; ?>];
var worp = 0;
var legstotwin = <?php echo $_POST['legs']?>;
var scores = [501, 501];
var legs = [0,0];
var beginspeler = null;
var gameid = <?php echo $_POST["gameid"]?>;
var spelers = [<?php echo "'" . $_SESSION['username'] . "'" . ",'" . $_POST['tegenstander'] . "'"; ?>];
var bspeler = Math.floor(Math.random()*2);
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
echo "}";
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
    beurtarray[0].className = "speler1spel";
    beurtarray[1].className = "speler2spel";
    beurtarray[spelerbeurt].className = "speler" + (spelerbeurt + 1) + "spelactief";

}
function geworpen(){
    if(document.getElementById('puntengegooid').value > 180 || document.getElementById('puntengegooid').value == 169 || document.getElementById('puntengegooid').value == 168 || document.getElementById('puntengegooid').value == 166 || document.getElementById('puntengegooid').value == 165 || document.getElementById('puntengegooid').value == 163 || document.getElementById('puntengegooid').value == 162 || document.getElementById('puntengegooid').value == 159 || document.getElementById('puntengegooid').value % 1 !== 0) return;
    if(scores[spelerbeurt] - document.getElementById('puntengegooid').value == 0){
        legs[spelerbeurt]++;
        scores[0] = 501;
        scores[1] = 501;
        beginspeler = beginspeler * -1 + 1;
        const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                    //console.log(this.responseText);
                }
            xhttp.open("GET", "php/saveworp.php?game=" + gameid + "&worp=" + worp + "&speler=" + spelers[spelerbeurt] + "&aantal=" + document.getElementById('puntengegooid').value + "&worpsoort=" + worpsoort[spelerbeurt] + "&spelsoort=Classic 501legwin");
            xhttp.send();
            beurt(spelerbeurt);
            worp++;
            legworp++;
            beurt(beginspeler * -1 + 1);
    }
    else{
        if(document.getElementById('puntengegooid').value == 180 && scores[spelerbeurt] - document.getElementById('puntengegooid').value > 2){
                //audio.play();
            }
    if(document.getElementById('puntengegooid').value <= 180 && document.getElementById('puntengegooid').value >= 0 && document.getElementById('puntengegooid').value != ""){
        if(scores[spelerbeurt] - document.getElementById('puntengegooid').value < 2){
            beurt(spelerbeurt);
        }
        else{
            som[spelerbeurt] = som[spelerbeurt] + parseInt(document.getElementById('puntengegooid').value);
            scores[spelerbeurt] = scores[spelerbeurt] - document.getElementById('puntengegooid').value;
                const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                    //console.log(this.responseText);
                }
            xhttp.open("GET", "php/saveworp.php?game=" + gameid + "&worp=" + worp + "&speler=" + spelers[spelerbeurt] + "&aantal=" + document.getElementById('puntengegooid').value+ "&worpsoort=" + worpsoort[spelerbeurt] + "&spelsoort=Classic 501") ;
            xhttp.send();
            beurt(spelerbeurt);
            worp++;
            legworp++;
    }
    
 
}

    }
if(legs[0] == Math.floor(legstotwin / 2) + 1 || legs[1] == Math.floor(legstotwin / 2) + 1){
    document.getElementById("winmessage").innerHTML = spelers[legs.indexOf(Math.max(...legs))] + " wint"
    document.getElementById("spelgestart").hidden = "hidden";
    document.getElementById("win").hidden = "";
    document.getElementById("videoplay").play();
    gameid++;
}
if(spelerbeurt == 0){
        aantalbeurten2++;
        if(scores[1] > 170){
            if(aantalbeurten2 >= 3){
            worpsoort[1] = "normaal";
        }
        }
        else{
            worpsoort[1] = "uitgooi";
        }
    }
    if(spelerbeurt == 1){
        aantalbeurten1++;
        if(scores[0] > 170){
            if(aantalbeurten1 >= 3){
                worpsoort[0] = "normaal";
            }
        }
            else{
                worpsoort[0] = "uitgooi";
            }
    }

document.getElementById('puntengegooid').value = "";
document.getElementById('score' + spelerbeurt).innerHTML = scores[spelerbeurt];
document.getElementById('score0').innerHTML = scores[0];
document.getElementById('score1').innerHTML = scores[1];
document.getElementById("stand").innerHTML = legs[0] + " - " +  legs[1];
if(isNaN(Math.round((som[0] / (aantalbeurten1))*100) / 100)){
    gemspeler.innerHTML = "gemiddelde : " + 0;
}
else{
    gemspeler.innerHTML = "gemiddelde : " + Math.round((som[0] / (aantalbeurten1))*100) / 100;
}
if(isNaN(Math.round((som[1] / (aantalbeurten2)) * 100) / 100)){
    gemtegenspeler.innerHTML = "gemiddelde: " + 0;
}
else{
    gemtegenspeler.innerHTML = "gemiddelde: " + Math.round((som[1] / (aantalbeurten2)) * 100) / 100;
}
document.getElementById("uitgooi0").innerHTML = "";
document.getElementById("uitgooi1").innerHTML = "";

if(scores[0] < 170){
    document.getElementById("uitgooi0").innerHTML = uitgooi["w" + scores[0]];
}
if(scores[1] < 170){
    document.getElementById("uitgooi1").innerHTML = uitgooi["w" + scores[1]];
}

}

function restart(){
    
    document.getElementById("spelerkeuze").hidden = "";
    document.getElementById("win").hidden = "hidden";
    document.getElementById("videoplay").pause();
    legs[0] = 0;
    legs[1] = 0;
    document.getElementById("stand").innerHTML = legs[0] + " - " +  legs[1];
    aantalbeurten2 = 0;
    aantalbeurten1 = 0;
    som[0] = 0;
    som[1] = 0;
    gemspeler.innerHTML = "gemiddelde : " + som[0] / (aantalbeurten1);
    gemtegenspeler.innerHTML = "gemiddelde: " + som[1] / (aantalbeurten2);
    worp = 0;
}


var input = document.getElementById("puntengegooid");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("okbutton").click();
  }
});

var gegooidewaarde;

function aftellen(n){
    if(n > 0){
        scores[spelerbeurt]--;
        aftellen(n-1);
        document.getElementById('score' + spelerbeurt).innerHTML = scores[spelerbeurt];
    }
}



</script>

</body>
</html>
