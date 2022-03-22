<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="css/css.css">

</head>

<?php
require('php/logincheck.php');
$sql = "SELECT `naam`, `rating501` FROM `elo` WHERE naam = '" . $_SESSION['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s1rating = $dbid['rating501'];
    }
}
?>

<nav><h3 class="username"><?php echo $_SESSION['username'] . ' (' . $s1rating . ')';?></h3></nav>
<div class="container">
<?php
include 'php/moduscontainer.php';
?>
<div class="scherm">
        <div class="statistiekenscherm">
            <div class="profielcontent">
                <div id="profielcontentinner" class="profielcontentinner">
            <h1 class="header">Leaderboard</h1>
            <table class="zie">
                <tr>
                <th>Speler</th>
                <th>Rating</th>
                </tr>
            <?php
            $sql = "SELECT  `naam`, `rating501` FROM elo ORDER BY rating501 DESC";
            $records = mysqli_query($DBverbinding, $sql);
            if (mysqli_num_rows($records) > 0) {
                while ($dbid = mysqli_fetch_assoc($records)) {
                    if($_SESSION['username'] == $dbid["naam"]){
                        echo "<tr>" . "<td>" . $dbid["naam"] . "</td>" . "<td>" . $dbid["rating501"] . "</td>" . "</tr>";
                    }
                    else{
                        echo "<tr>" . "<td class='link'><a href='speler.php?speler=" . $dbid["naam"] . "'>" . $dbid["naam"] . "</a></td>" . "<td>" . $dbid["rating501"] . "</td>" . "</tr>";
                    }
                }
            }
            ?>
            </table>
<br><br><br>
            </div>
            </div>
        </div>
</div>




</html>