<html>
<head>
<?php
require('php/logincheck.php');
?>
    <link rel="stylesheet" href="css/css.css">

</head>
<body>
<div id="spelerkeuze">
<h1>Wie gooide het dichts bij de Bullseye</h1>
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
    <h1 id="stand">0 - 0</h1>
    <div class="spelers">
        <div class="speler1spel" id="speler1">
            <h1 id="score0">501</h1>
            <h2><?php echo $_SESSION['username']; ?></h2>
        </div>
        <div class="speler2spel" id="speler2">
            <h1 id="score1">501</h1>
            <h2><?php echo $_POST['tegenstander']?></h2>
        </div>
    </div>
    <br>
    <input type="number" id="puntengegooid" min="1" max="180" value="1" placeholder="aantal punten gegooid">
    <input type="button" value="Ok" onclick="geworpen();">
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
var scores = [501, 501];
var legs = [0,0];
var beginspeler = null;
var spelers = [<?php echo "'" . $_SESSION['username'] . "'" . ",'" . $_POST['tegenstander'] . "'"; ?>];
    function startspeler(speler){
        document.getElementById("spelerkeuze").hidden = "hidden";
        document.getElementById("spelgestart").hidden = "";
        beginspeler = speler;
        spelerbeurt = speler * -1 + 1;
        beurt(speler);
    }

var beurtarray = [];
var spelerbeurt = 0;
beurtarray[0] = document.getElementById('speler1');
beurtarray[1] = document.getElementById('speler2');

function beurt(speler){
    spelerbeurt = spelerbeurt * -1 + 1;
    beurtarray[0].className = "speler1spel"
    beurtarray[1].className = "speler2spel";
    beurtarray[spelerbeurt].className = "speler" + (spelerbeurt + 1) + "spelactief";

}
function geworpen(){
    if(scores[spelerbeurt] - document.getElementById('puntengegooid').value == 0){
        legs[spelerbeurt]++;
        document.getElementById("stand").innerHTML = legs[0] + "-" +  legs[1];
        scores[0] = 501;
        scores[1] = 501;
        document.getElementById('score0').innerHTML = scores[0];
        document.getElementById('score1').innerHTML = scores[1];
        document.getElementById('puntengegooid').value = 1;
    }
    else{
    if(scores[spelerbeurt] - document.getElementById('puntengegooid').value < 2){
        beurt(spelerbeurt);
        document.getElementById('puntengegooid').value = 1;
    }
    else{
    if(document.getElementById('puntengegooid').value <= 180){
        scores[spelerbeurt] = scores[spelerbeurt] - document.getElementById('puntengegooid').value;
        document.getElementById('puntengegooid').value = 1;
        document.getElementById('score' + spelerbeurt).innerHTML = scores[spelerbeurt];
        beurt(spelerbeurt);
    }
    else{
        alert("Opgegeven waarde kan niet");
        document.getElementById('puntengegooid').value = 1;
    }
}
}



}

</script>

</body>
</html>
