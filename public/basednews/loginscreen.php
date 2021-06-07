<?php
    require("php/database.php");
    require("php/head.php");
?>

<html>
<head>
<link rel="stylesheet"  href="css/login.css">
</head>
<body>
<div class="header">
  <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360"></a>
  <div class="header-right">
<div class="dropdown">
  <!--<div class="dropdown-content">
    <form action="login.php" method="POST">
        <p>log in</p>
        <input type="text" name="username" placeholder="Gebruikersnaam">
        <input type="password" name="password" placeholder="Wachtwoord">
    <input type="submit">
    </form>
  </div>-->
</div>
  </div>
</div>
 
<div class="loginscreen">
        <form action="login.php" method="POST">
        <h2>log in</h2>
        <input type="text" name="username" placeholder="Gebruikersnaam">
        <input type="password" name="password" placeholder="Wachtwoord">
    <input type="submit">
    </form>
<br>


</div>


</body>


</html>