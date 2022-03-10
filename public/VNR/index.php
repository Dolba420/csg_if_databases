<?php
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="css/css.css">

</head>
<body>
    <?php
    require 'php/database.php';
    ?>
<img src="media/logomooi.png" class="logo">
<form action="dashboard.php" method="post">
    <h2>Log in</h2>
    <input type="name" name="username" placeholder="Gebruikersnaam">
    <input type="password" name="password" placeholder="Wachtwoord">
    <input type="submit" value="Log in"><br>
</form>
<a href="maakaccount.php"><h3>Maak een account</h3></a>
</body>
</html>