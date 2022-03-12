<html>
<head>

    <link rel="stylesheet" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<?php
require('php/logincheck.php');
?>

<nav><h3 class="username"><?php echo $_SESSION['username'];?> (1236)</h3></nav>
<div class="container">
<?php
require('php/moduscontainer.php');
?>
<div class="scherm">
        <img src="media/logomooi.png" class="dashboardfoto">
</div>
</div>
</html>