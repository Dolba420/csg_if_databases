<html>
<head>

    <link rel="stylesheet" href="css/css.css">

</head>

<?php
require('php/logincheck.php');
?>

<nav><h3 class="username"><?php echo $_SESSION['username'];?> (1236)</h3></nav>
<div class="container">
<?php
include 'php/moduscontainer.php';
?>
<div class="scherm">
        <div class="statistiekenscherm">
            <div class="profielcontent">
                <div class="profielcontentinner">
            <h1>Statistieken</h1>
            <table>
                <tr>
                <th>Soort</th>
                <th>Gemiddelde</th>
            </tr>
            <tr>
                <td>Gemiddelde per drie darts</td>
                <td id="gemiddelde">Centro comercial Moctezuma</td>
            </tr>
            <tr>
                <td>Eerste negen darts gemiddelde</td>
                <td id="eerste9">Francisco Chang</td>
            </tr>
            <tr>
                <td>aantal keer 100+ gegooid</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde > 100";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["count(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
            <tr>
                <td>aantal keer 140+ gegooid</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde > 140";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["count(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
            <tr>
                <td>aantal keer 180 gegooid</td>
                <td id="honderdplus"> <?php
                $sql = "SELECT count(worp_waarde) FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worp_waarde = 180";
                $records = mysqli_query($DBverbinding, $sql);
                if (mysqli_num_rows($records) > 0) {
                    while ($dbid = mysqli_fetch_assoc($records)) {
                        echo $dbid["count(worp_waarde)"];
                    }
                }
                else{
                    echo 0;
                }
                ?></td>
            </tr>
</table>
<br><br>
            </div>
            </div>
        </div>
</div>
<script>
var gemiddelde = document.getElementById("gemiddelde");
var alleworpen = <?php  
                    echo "[";
                    $sql = "SELECT * FROM worp WHERE speler = '" . $_SESSION['username'] . "'";
                    $records = mysqli_query($DBverbinding, $sql);
                    if (mysqli_num_rows($records) > 0) {
                        while ($dbid = mysqli_fetch_assoc($records)) {
                            echo $dbid["worp_waarde"] . ",";
                        }
                    }
                    else{
                        echo 0;
                    }
                    echo "];";
            ?>
var eerste9 = <?php  
                    echo "[";
                    $sql = "SELECT * FROM worp WHERE speler = '" . $_SESSION['username'] . "' AND worpsoort = 'eerste9'";
                    $records = mysqli_query($DBverbinding, $sql);
                    if (mysqli_num_rows($records) > 0) {
                        while ($dbid = mysqli_fetch_assoc($records)) {
                            echo $dbid["worp_waarde"] . ",";
                        }
                    }
                    else{
                        echo 0;
                    }
                    echo "];";
            ?>



var someerste9 = 0;
for (var x = 0; x < eerste9.length; x++) {
    someerste9 += eerste9[x];
}
document.getElementById("eerste9").innerHTML =  Math.round((someerste9 / eerste9.length) * 100) / 100;


var somalleworpen = 0;
for (var x = 0; x < alleworpen.length; x++) {
    somalleworpen += alleworpen[x];
}
gemiddelde.innerHTML =  Math.round((somalleworpen / alleworpen.length) * 100) / 100;
</script>



</html>
<?php
//print_r($_SESSION);

?>