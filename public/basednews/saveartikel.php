<?php
include("php/database.php");
$sql = "SELECT MAX(id) FROM berichten";
$records = mysqli_query($DBverbinding, $sql);
$nieuwste_artikel;
if (mysqli_num_rows($records) > 0) {
    while($dbid = mysqli_fetch_assoc($records)) {
        $nieuwste_artikel = $dbid['MAX(id)'];
    }
}

$sql1 = "INSERT INTO `berichten`(`id`, `headline`, `auteur`, `bericht`, `tags`, `datum`, `image`) VALUES (";
$sql2 =  $nieuwste_artikel+1 . ",'" . $_POST['headline'] . "','" . "Dolf Bosch" . "','" . $_POST['bericht'] . "','" . "N/A" . "','" . date("Y/m/d") . "', 'img/braai.jpg')";
$sql = $sql1 . $sql2;
if ($DBverbinding->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $DBverbinding->error;
}

?>