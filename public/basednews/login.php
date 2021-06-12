 <html>
 <?php
    require('php/database.php');
    ?>

 <head>
     <link rel="stylesheet" href="css/login.css">
     <link rel='icon' href='logo/based.ico' type='image/x-icon'>
 </head>

 <body>
     <?php
        $fout = 0;
        if (isset($_POST['username']) && $_POST['username'] != "" && $_POST['password'] != "") {
            $sql = 'SELECT * FROM `accounts` WHERE accountnaam="' . $_POST['username'] . '"';
            $ingelogt = false;
            $records = mysqli_query($DBverbinding, $sql);
            if (mysqli_num_rows($records) > 0) {
                while ($dbid = mysqli_fetch_assoc($records)) {
                    if ($dbid['password'] == $_POST['password']) {
                        $ingelogt = true;
                        session_start();
                        $_SESSION["log"] = true;
                        $_SESSION["gebruiker"] = $_POST['username'];
                    }
                }
            } else {
                $fout = 1;
            }
        } else {
            $fout = 2;
        }
        ?>



     <div class="header">
         <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360"></a>
         <div class="header-right">
             <div class="dropdown">
             </div>
         </div>
     </div>

     <div class="loginscreen">
         <?php
            if ($fout == 0) {
                echo '<p style="font-size: 20px;">Welkom ' . $_SESSION["gebruiker"] . '</p><a href="admin.php" style="font-size: 20px;">ga naar het adminscherm </a>';
            } elseif ($fout == 1) {
                echo '<p style="font-size: 20px;">Wachtwoord onjuist</p>';
            } elseif ($fout == 2) {
                echo '<p style="font-size: 20px;">Geen gebruiker of wachtwoord aangegeven </p>';
            }
            ?>



     </div>

 </body>

 </html>