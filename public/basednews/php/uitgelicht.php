<?php

echo '<main>';

$sql = "SELECT * FROM berichten ORDER BY id DESC";
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