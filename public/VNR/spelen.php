<html>
<head>

    <link rel="stylesheet" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<?php
require('php/logincheck.php');
$sql = "SELECT max(game_id) FROM worp";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        if($dbid["max(game_id)"] == null){
                $gameid = 0;
        }
        else{
                $gameid = $dbid["max(game_id)"] + 1;
        }
    }
}
$sql = "SELECT `naam`, `rating501` FROM `elo` WHERE naam = '" . $_SESSION['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s1rating = $dbid['rating501'];
    }
}



if(isset($_SESSION['speler2'])){
        $sql = "SELECT `naam`, `rating501` FROM `elo` WHERE naam = '" . $_SESSION['speler2'] . "'";
        $records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s2rating = $dbid['rating501'];
    }
}
}


?>

<nav><h3 class="username"><?php echo $_SESSION['username'] . ' (' . $s1rating . ')';?><?php if(isset($_SESSION['speler2'])){ echo ", " . $_SESSION['speler2'] . ' (' . $s2rating . ')';} ?> </h3></nav>
<div class="container">
<?php
require('php/moduscontainer.php');
?>
<div class="scherm">
        <div class="spelinstellingen">
            <div class="spelinstellingeninhoud">
        <div class="instellingeninhoud">
                <form id="form" action="start_spel.php" class="inhoud" method="post">
                <h3 class="kopjeinstellingen">Beginspeler</h3>
                <select name="begin" id="begin" onchange="">
                        <option value="bull">Bullseye</option>
                        <option value="willekeurig">Willekeurig</option>
                        <option value="ik">Ik</option>
                        <option value="tegenstander">Tegenstander</option>
                </select>
                <h3 class="kopjeinstellingen" >Spel</h3>
                <select name="spel" id="spel" id="spel" onchange="speltype();">
                        <option value="classic 501">Classic 501</option>
                        <option value="minigame125">125 minigame</option>
                        <option value="oefen501">501 classic oefenen</option>
                        <option value="oefen125">125 minigame oefenen</option>
                </select>
                <h3 class="kopjeinstellingen">Tegenstander</h3>
                <div class="nieuwe_tegenstander" id="nieuwe_tegenstander">
                <select name="tegenstander" id="tegenstander">
                        <?php
                        if(isset($_SESSION['speler2'])){
                                echo '<option value="' . $_SESSION['speler2'] . '">' . $_SESSION['speler2'] . '</option>';
                        }
                        else{
                                echo '<option value="null">Geen recente tegenstanders</option>';
                        }
                        ?>
                <input type="button" class="new_tegenstanderinput" value="Nieuwe tegenstander" onclick="togglevisibility();">
                </div>
                <h3 class="kopjeinstellingen">geluidjes<input class="checkbox" type="checkbox" name="geluid" checked="true"></h3>
                <h3 class="kopjeinstellingen">Aantal Legs voor winst</h3>
                <input type="number" class="kieslegs" id="frontendlegs" min="1" onchange="document.getElementById('serverlegs').value = document.getElementById('frontendlegs').value;" name="legs" value="<?php if(isset($_SESSION['aantallegs'])){ echo $_SESSION['aantallegs']; } else{ echo 1;}?>">
                <h3 id="warning" hidden="hidden" class="warning">Let op: oefeningen tellen niet mee voor je gemiddelde</h3>
                
                <div class="rated">
                
                </div>
                <br>
                <input type="text" value=<?php echo '"' . $gameid . '"'?> name="gameid" hidden="hidden">
                <input id="submitknop" type="submit" value="<?php if(isset($_SESSION['speler2'])){ echo "spelen";} else{ echo "Laat de tegenstander eerst inloggen";}?>" class="kieslegs" <?php if(isset($_SESSION['speler2'])){} else{ echo "disabled";}?>><br>

        </form>

            </div>
        </div>
        </div>
<div class="speler2login" style="visibility: hidden;" id="speler2login">
        <h1>Tegenstander</h1>
        
        <form action="speler2login.php" method="post">
    <h2>Log in</h2>
    <input type="name" class="s2login" name="username" placeholder="Gebruikersnaam">
    <input type="password" class="s2login" name="password" placeholder="Wachtwoord">
    <input type="submit" class="s2login" value="Log in"><br>
    <input type="tekst" value="1" id="serverlegs" name="legs" hidden="hidden">
    <input type="tekst" value="classic 501" name="serverspel" id="serverspel" hidden="hidden">
    <input type="tekst" value="bull" name="serverbegin" id="serverbegin" hidden="hidden">
</form>
        </div>
</div>

</div>

<script>
var vis = 0;
function togglevisibility(){
        if(vis == 0){
                document.getElementById("speler2login").style = "visibility: visible;";
                vis = 1
        }
        else{
                document.getElementById("speler2login").style = "visibility: hidden;";
                vis = 0;
        }
}
function speltype(){
        if(document.getElementById('spel').value == 'classic 501'){
                document.getElementById('form').action = 'start_spel.php';
                if(document.getElementById('tegenstander').value == 'null'){
                        document.getElementById('submitknop').disabled = true;
                        document.getElementById('submitknop').value = '<?php if(isset($_SESSION['speler2'])){ echo "spelen";} else{ echo "Laat de tegenstander eerst inloggen";}?>';
                        document.getElementById('warning').hidden = "hidden";
                }
                else{
                        document.getElementById('warning').hidden = "hidden";
                        document.getElementById('submitknop').disabled = false;
                        document.getElementById('submitknop').value = '<?php if(isset($_SESSION['speler2'])){ echo "spelen";} else{ echo "Laat de tegenstander eerst inloggen";}?>';
                }
        }
        if(document.getElementById('spel').value == 'minigame125'){
                document.getElementById('form').action = '125uitgooi.php';
                if(document.getElementById('tegenstander').value == 'null'){
                        document.getElementById('warning').hidden = "hidden";
                        document.getElementById('submitknop').disabled = true;
                        document.getElementById('submitknop').value = '<?php if(isset($_SESSION['speler2'])){ echo "spelen";} else{ echo "Laat de tegenstander eerst inloggen";}?>';
                }
                else{
                        document.getElementById('warning').hidden = "hidden";
                        document.getElementById('submitknop').disabled = false;
                        document.getElementById('submitknop').value = '<?php if(isset($_SESSION['speler2'])){ echo "spelen";} else{ echo "Laat de tegenstander eerst inloggen";}?>';
                }
        }
        if(document.getElementById('spel').value == 'oefen501'){
                document.getElementById('warning').hidden = "";
                document.getElementById('submitknop').disabled = false;
                document.getElementById('form').action = 'oefening501.php';
                document.getElementById('submitknop').value = 'Oefenen';
        }
        if(document.getElementById('spel').value == 'oefen125'){
                document.getElementById('warning').hidden = "";
                document.getElementById('form').action = 'oefening125.php';
                document.getElementById('submitknop').disabled = false;
                document.getElementById('submitknop').value = 'Oefenen';
        }
}



</script>
</html>