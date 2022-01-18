<html>
<head>

    <link rel="stylesheet" href="css/css.css">

</head>

<?php
require 'php/database.php';
        if(isset($_SESSION['username'])){
            $_SESSION['ingelogt'] = true;
        }
        $sql = "SELECT * FROM login WHERE gebruikersnaam = '" . $_POST['username'] . "'";
        $records = mysqli_query($DBverbinding, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                $password = $dbid["wachtwoord"];
            }
            if (password_verify($_POST['password'], $password)) {
                $_SESSION['ingelogt'] = true;
                $_SESSION['username'] = $_POST['username'];
            } else {
                echo "Wachtwoord onjuist, u wordt doorverwezen.";
                echo '<head><meta http-equiv="refresh" content="1.5;url=index.php" /></head>';
            }
        }



?>
<nav><h3 class="username"><?php echo $_SESSION['username'];?> (1236)</h3></nav>
<div class="container">
<div class="sidebar">
<div class="moduscontainer">
<h1 class="modus">Spelen</h1>
</div>
<div class="moduscontainer">
<h1 class="modus">Statistiek</h1>
</div>
<div class="moduscontainer">
<h1 class="modus">Regels en Veiligheid</h1>
</div>
<div class="moduscontainer">
<h1 class="modus">Profiel</h1>
</div>
</div>
<div class="scherm"></div>
</div>
</html>