<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
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
                <div id="profielcontentinner" class="profielcontentinner">
            <h1 class="header"><?php 
                        $naam = array();
                        $sql = "SELECT DISTINCT  speler FROM worp WHERE game_id = " . $_GET['game'];
                        $records = mysqli_query($DBverbinding, $sql);
                        if (mysqli_num_rows($records) > 0) {
                            while ($dbid = mysqli_fetch_assoc($records)) {
                                array_push($naam, $dbid["speler"]);
                            }
                        }
            echo $naam[0] . " vs. " . $naam[1];
            ?></h1>
            <h2>
                    <?php
                        $sql = "SELECT DISTINCT  spelsoort FROM worp WHERE game_id = " . $_GET['game'];
                        $records = mysqli_query($DBverbinding, $sql);
                        if (mysqli_num_rows($records) > 0) {
                            while ($dbid = mysqli_fetch_assoc($records)) {
                                if($dbid['spelsoort'] == 'Classic 501legwin' OR $dbid['spelsoort'] == '125 uitgooienlegwin'){

                                }
                                else{
                                    $spelsoort = $dbid['spelsoort'];
                                }
                            }
                            echo $spelsoort;
                        }
                    ?>
            </h2>
            <p>
                <?php
                            $sql = "SELECT DISTINCT datum FROM worp WHERE game_id = " . $_GET['game'];
                            $records = mysqli_query($DBverbinding, $sql);
                            if (mysqli_num_rows($records) > 0) {
                                while ($dbid = mysqli_fetch_assoc($records)) {
                                    $datum = $dbid['datum'];
                                }
                            }
                            echo $datum;
                
                ?>
            </p>

    <table class="zie">
  <tr>
    <th>Speler</th>
    <th>Worpwaarde</th>
    <th>Score</th>
  </tr>
  <tr>
    <td><?php echo $naam[0]; ?></td>
    <td></td>
    <td><?php if($spelsoort == 'Classic 501'){ echo 501; $spel = 501;} else{ echo 125; $spel = 125;}?></td>
  </tr>
  <tr>
    <td><?php echo $naam[1]; ?></td>
    <td></td>
    <td><?php if($spelsoort == 'Classic 501'){ echo 501; $spel = 501;} else{ echo 125; $spel = 125; $std = Array($naam[0] => 125, $naam[1] =>  125);}?></td>
  </tr>
  <?php
                            $scores = array($naam[0] => $spel, $naam[1] => $spel);
                            $sql = "SELECT * FROM worp WHERE game_id = " . $_GET['game'];
                            $records = mysqli_query($DBverbinding, $sql);
                            if (mysqli_num_rows($records) > 0) {
                                while ($dbid = mysqli_fetch_assoc($records)) {
                                    if($spel == 501){
                                        $scores[$dbid['speler']] = $scores[$dbid['speler']] - $worp_waarde = $dbid['worp_waarde'];
                                        if($scores[$dbid['speler']] == 0 AND $_SESSION['username'] == $dbid['speler']){
                                            $class = "uit";
                                            $reset = true;
                                        }
                                        else if($scores[$dbid['speler']] == 0 AND $_SESSION['username'] != $dbid['speler']){
                                            $class = "tegenuit";
                                            $reset = true;
                                        }
                                    }
                                    if($spel == 125){
                                        $scores[$dbid['speler']] = $scores[$dbid['speler']] - $worp_waarde = $dbid['worp_waarde'];
                                        if($scores[$dbid['speler']] == 0 AND $_SESSION['username'] == $dbid['speler']){
                                            $class = "uit";
                                            $reset = true;
                                        }
                                        else if($scores[$dbid['speler']] == 0 AND $_SESSION['username'] != $dbid['speler']){
                                            $class = "tegenuit";
                                            $reset = true;
                                        }
                                    }
                                    echo '<tr class="' . $class . '">';
                                    $speler = $dbid['speler'];
                                    $worp_waarde = $dbid['worp_waarde'];
                                    $worp_id = $dbid['worp_id'];
                                    echo '<td>' . $speler .  '</td><td>' . $worp_waarde . '</td><td>' .  $scores[$dbid['speler']] . '</td>';
                                    echo '</tr>';
                                    $class = '';
                                    if($reset == true){
                                        if($spel == 501){
                                        $scores[$naam[0]] = $spel;
                                        $scores[$naam[1]] = $spel;
                                        $reset = false;
                                        }
                                        else{
                                            if($speler == $naam[0]){
                                                $scores[$naam[0]] = $std[$naam[0]] + 2;
                                                $scores[$naam[1]] = $std[$naam[1]] - 2;
                                                $std[$naam[0]] = $std[$naam[0]] + 2;
                                                $std[$naam[1]] = $std[$naam[1]] - 2;
                                            }
                                            else{
                                                $scores[$naam[1]] = $std[$naam[1]] + 2;
                                                $scores[$naam[0]] = $std[$naam[0]] - 2;
                                                $std[$naam[0]] = $std[$naam[0]] - 2;
                                                $std[$naam[1]] = $std[$naam[1]] + 2;
                                            }
                                            $reset = false;
                                        }
                                    }
                                }
                                echo "<br><br><br><br>";
                            }
                
                ?>




</table>

            </div>
            </div>
        </div>
</div>



</html>