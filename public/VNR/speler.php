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
            <h1 class="header"><?php echo "Gemiddelde " . $_SESSION['username'] . " VS " .  $_GET['speler']; ?></h1>
           

            </div>
            </div>
        </div>
</div>



</html>