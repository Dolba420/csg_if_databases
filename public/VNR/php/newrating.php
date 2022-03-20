<?php
$k = 32;
require('database.php');
/*echo $_POST['username'];
echo $_POST['tegenstander'];*/

$sql = "SELECT `naam`, `rating501`, `rating125` FROM `elo` WHERE naam = '" . $_POST['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        if($_POST['game'] == 501){
            $s1rating = $dbid['rating501'];
        }
        else{
            $s1rating = $dbid['rating125'];
        }
    }
}


$sql = "SELECT `naam`, `rating501`, `rating125` FROM `elo` WHERE naam = '" . $_POST['tegenstander'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        if($_POST['game'] == 501){
            $s2rating = $dbid['rating501'];
            $sql = "UPDATE `elo` SET `rating501`=";
            $sqladd = "UPDATE `elo` SET `rating501`=";
        }
        else{
            $sql = "UPDATE `elo` SET `rating125`=";
            $sqladd = "UPDATE `elo` SET `rating125`=";
        }
    }
}



$winkansa = 1/(1+ pow(10, (($s2rating - $s1rating)/400)));
if($POST['username'] == $_POST['win']){
    $s1rating = $s1rating + $k * (1 - $winkansa);
    $s2rating = $s2rating - $k * (1 - $winkansa);

}
else{
    $s1rating = $s1rating - $k * $winkansa;
    $s2rating = $s2rating + $k * $winkansa;
    
}

$sql = $sql . $s1rating . " WHERE naam = '" . $_POST['username'] . "'";
$sqladd = $sqladd . $s2rating . " WHERE naam = '" . $_POST['tegenstander'] . "'";
echo $sql;
echo $sqladd;
$records = mysqli_query($DBverbinding, $sql);
$records = mysqli_query($DBverbinding, $sqladd);



?>