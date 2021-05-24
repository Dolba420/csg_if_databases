<?php
$sql = "SELECT MAX(id) FROM berichten";
$records = mysqli_query($DBverbinding, $sql);
$nieuwste_artikel;
if (mysqli_num_rows($records) > 0) {
    while($dbid = mysqli_fetch_assoc($records)) {
        $nieuwste_artikel = $dbid['MAX(id)'];
    }
}


$sql = "SELECT * FROM berichten WHERE id=$nieuwste_artikel";
$records = mysqli_query($DBverbinding, $sql);
$rijen = ["id", "headline", "auteur", "bericht", "tags","datum", "image"];
$artikel = [];
if (mysqli_num_rows($records) > 0) {
    while($dbid = mysqli_fetch_assoc($records)) {
        array_push($artikel, $dbid["id"]);
        array_push($artikel, $dbid["headline"]);
        array_push($artikel, $dbid["auteur"]);
        array_push($artikel, $dbid["bericht"]);
        array_push($artikel, $dbid["tags"]);
        array_push($artikel, $dbid["datum"]);
        array_push($artikel, $dbid["image"]);
    }
}

?>

<br>
<a href="artikel.php?artikel=<?php echo $artikel[0]?>">
<div class="container">
  <img src="img/coomer.png" style="width:100%;">
  <div class="uitgelicht_datum">
  </div>
  <div class="top-left"><?php echo $artikel[5];?></div>
  <div class="titel">
  </div>
  <div class="bottom-left"><h1 class="containerh1">Net binnen:</h1></div>
  <div class="bottom-left"><b><?php echo $artikel[1];?></b> Geschreven Door: <?php echo $artikel[2]?></div>

</div>
</a>
<br>


<a style="text-decoration:none;" href="artikel.php?artikel=x">
<div class="lijst">
    <img src="img/braai.jpg" height="100%">
    <div class="lijstinfo">
    <h3>Wanneer kan de braai weer aan?</h3>
    <p>Geschreven door: Dolf Bosch 5/22/21</p>
    </div>
</div>
</a>
<br>
<a style="text-decoration:none;" href="artikel.php?artikel=x">
<div class="lijst">
    <img src="img/baba.png" height="100%">
    <div class="lijstinfo">
    <h3>$BABA haalt nieuw hoogtepunt op $375 per aandeel</h3>
    <p>Geschreven door: Dolf Bosch 5/22/21</p>
    </div>
</div>
</a>
