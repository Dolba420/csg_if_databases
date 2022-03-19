<html>
<head>

    <link rel="stylesheet" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<?php
require('php/logincheck.php');
$sql = "SELECT `naam`, `rating` FROM `elo` WHERE naam = '" . $_SESSION['username'] . "'";
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while ($dbid = mysqli_fetch_assoc($records)) {
        $s1rating = $dbid['rating'];
    }
}

?>

<nav><h3 class="username"><?php echo $_SESSION['username'] . ' (' . $s1rating . ')';?> </h3></nav>
<div class="container">
<?php
if(isset($_SESSION['username'])){
    require('php/moduscontainer.php');
}
?>
<div class="scherm">
        <img src="media/logomooi.png" class="dashboardfoto">
</div>
</div>
</html>