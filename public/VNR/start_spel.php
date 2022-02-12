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
    
    <div class="speler1" id="speler1" onclick="startspeler(0)">
        <h1 class="spelertekst"><?php echo $_SESSION['username']; ?></h1>
    </div>
    <div class="speler2" id="speler2" onclick="startspeler(1)">
    <h1 class="spelertekst"><?php echo $_POST['tegenstander']?></h1>
    </div>
</div>
</div>

<div id="spelgestart" hidden="hidden">
    <h1 id="stand">0 - 0</h1>
    <div class="spelers">
        <div class="speler1spel">
            <h1 class="score">501</h1>
            <h2><?php echo $_SESSION['username']; ?></h2>
        </div>
        <div class="speler2spel">
            <h1 class="score">501</h1>
            <h2><?php echo $_POST['tegenstander']?></h2>
        </div>
    </div>
</div>

<!--
<table>
<?php 

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


?>
</table>
-->
<script>
var beginspeler = null;
var spelers = [<?php echo "'" . $_SESSION['username'] . "'" . ",'" . $_POST['tegenstander'] . "'"; ?>];
    function startspeler(speler){
        document.getElementById("spelerkeuze").hidden = "hidden";
        document.getElementById("spelgestart").hidden = "";
        beginspeler = speler;
    }
</script>

</body>
</html>
