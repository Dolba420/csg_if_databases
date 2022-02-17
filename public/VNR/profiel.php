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
            <h1>Statistieken</h1>
            <p id="gemiddelde">Gemiddelde per dart: </p>
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
                    echo "]";
            ?>

var som = 0;
for (var x = 0; x < alleworpen.length; x++) {
    som += alleworpen[x];
}
gemiddelde.innerHTML = "gemiddelde per dart " + Math.round((som / alleworpen.length) * 100) / 100;
</script>



</html>
<?php
//print_r($_SESSION);

?>