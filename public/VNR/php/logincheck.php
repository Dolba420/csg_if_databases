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
                echo '<head><meta http-equiv="refresh" content="1.5;url=index.php" /></head><!--';
            }
        }
        