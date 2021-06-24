<?php
    require("php/database.php");
    require("php/head.php");
?>

<html>
<head>
<link rel="stylesheet"  href="css/login.css">
<link rel='icon' href='logo/based.ico' type='image/x-icon'>
</head>
<body>
<div class="header">
  <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360"/></a>
  <div class="header-right">
<div class="dropdown">
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



</div>


</body>


</html>