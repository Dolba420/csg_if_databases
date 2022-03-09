<?php
require 'php/database.php';
$sql = "SELECT * FROM login WHERE gebruikersnaam = '" . $_POST['username'] . "'";
        $records = mysqli_query($DBverbinding, $sql);
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                $password = $dbid["wachtwoord"];
            }
            if (password_verify($_POST['password'], $password)) {
                $_SESSION['ingelogt'] = true;
                if(isset($_POST['username'])){
                    $_SESSION['speler2'] = $_POST['username'];
                    echo "u wordt doorverwezen.";
                    echo '<head><meta http-equiv="refresh" content="1.5;url=spelen.php" /></head>';
                }
            } else {
                echo "Wachtwoord onjuist, u wordt doorverwezen.";
                echo '<head><meta http-equiv="refresh" content="1.5;url=spelen.php" /></head><!--';
            }
        }
        
$_SESSION['aantallegs'] = $_POST['legs'];
$_SESSION['serverspel'] = $_POST['serverspel'];
$_SESSION['serverbegin'] = $_POST['serverbegin'];
?>