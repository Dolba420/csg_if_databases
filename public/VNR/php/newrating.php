<?php

/*echo $_POST['username'];
echo $_POST['tegenstander'];*/

$sql = "SELECT `naam`, `rating` FROM `elo` WHERE naam = '" . $_POST['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s1rating = $dbid['rating'];
    }
}

echo $sql;

$sql = "SELECT `naam`, `rating` FROM `elo` WHERE naam = '" . $_POST['tegenstander'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s2rating = $dbid['rating'];
    }
}

//echo 1/(1+ pow(10, (($s2rating - $s1rating)/400)));



?>