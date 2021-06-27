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
        array_push($artikel, htmlspecialchars($dbid["id"]));
        array_push($artikel, htmlspecialchars($dbid["headline"]));
        array_push($artikel, htmlspecialchars($dbid["auteur"]));
        array_push($artikel, htmlspecialchars($dbid["bericht"]));
        array_push($artikel, htmlspecialchars($dbid["tags"]));
        array_push($artikel, htmlspecialchars($dbid["datum"]));
        array_push($artikel, $dbid["image"]);
    }
}

echo '<main>';
?>

<a href="artikel.php?artikel=<?php echo $artikel[0] ?>">
    <article>
        <img class="lijstimage" src="<?php echo $artikel[6]; ?>">
        <div class="lijstinfo">
        <h3><?php echo $artikel[1]; ?></h3>
        <p>Door: <strong><?php echo $artikel[2] ?></strong></p>
    </article>
</a>

<?php

$sql = "SELECT * FROM berichten WHERE NOT id=$nieuwste_artikel ORDER BY id DESC";
$records = mysqli_query($DBverbinding, $sql);
$lijst = [];
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        echo '
        <a href="artikel.php?artikel=' . htmlspecialchars($dbid["id"]) . '">
        <article>
            <img class="lijstimage" src="' . $dbid["image"] . '">
            <div class="lijstinfo">
            <h3>' . htmlspecialchars($dbid["headline"]) . '</h3>
            <p>Door: <strong>' . htmlspecialchars($dbid["auteur"]) . '</strong> op ' . htmlspecialchars($dbid["datum"]) . '</p>
        </article>
        </a>
        ';
    }
}

echo '</main>';
?>