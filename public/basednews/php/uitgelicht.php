<?php
$sql = "SELECT MAX(id) FROM berichten";
$records = mysqli_query($DBverbinding, $sql);
$nieuwste_artikel;
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $nieuwste_artikel = $dbid['MAX(id)'];
    }
}


$sql = "SELECT * FROM berichten WHERE id=$nieuwste_artikel";
$records = mysqli_query($DBverbinding, $sql);
$artikel = [];
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        array_push($artikel, $dbid["id"]);
        array_push($artikel, $dbid["headline"]);
        array_push($artikel, $dbid["auteur"]);
        array_push($artikel, $dbid["bericht"]);
        array_push($artikel, $dbid["tags"]);
        array_push($artikel, $dbid["datum"]);
        array_push($artikel, $dbid["image"]);
    }
}

echo '<main>';
?>

<a href="artikel.php?artikel=<?php echo $artikel[0] ?>">
    <article>
        <img src="<?php echo $artikel[6]; ?>" style="width:100%;" />
        <div class="uitgelicht_datum">
        </div>
        <div class="top-left"><?php echo $artikel[5]; ?></div>
        <div class="titel">
        </div>
        <div class="bottom-left">
            <h1 class="containerh1">Net binnen:</h1>
        </div>
        <div class="bottom-left"><b><?php echo $artikel[1]; ?></b> Geschreven Door: <?php echo $artikel[2] ?></div>
    </article>
</a>

<?php

$sql = "SELECT * FROM berichten WHERE NOT id=$nieuwste_artikel ORDER BY id DESC";
$records = mysqli_query($DBverbinding, $sql);
$lijst = [];
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        echo '
        <a href="artikel.php?artikel=' . $dbid["id"] . '">
        <article>
            <img class="lijstimage" src="' . $dbid["image"] . '">
            <div class="lijstinfo">
            <h3>' . $dbid["headline"] . '</h3>
            <p>Geschreven door: ' . $dbid["auteur"] . ' op ' . $dbid["datum"] . '</p>
        </article>
        </a>
        ';
    }
}

echo '</main>';
?>