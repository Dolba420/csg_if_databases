<!DOCTYPE html>
<html>
<?php
require("php/head.php");
require("php/database.php");
?>

<body>
<?php
$adminscreen = true;
require("php/header.php");
?>


    <?php
    session_start();


    ?>

    <?php
    if (isset($_SESSION['gebruiker'])) {
        echo '<div class="maakartikel">Welkom <b>' . $_SESSION['gebruiker'] . "</b>";
        echo '
<form action="saveartikel.php" method="post" enctype="multipart/form-data">

  <p style="margin-top: 20px;">Foto:</p>
  <input style="margin-right: 100%; margin-top: 20px" type="file" name="headlinefoto" id="fileToUpload">

    <input style="margin-right: 100%; margin-top: 20px" type="text" name="headline" placeholder="Titel"/>
    
    <textarea style="resize: none; margin-right: 100%; margin-top: 20px" name="bericht" placeholder="Artikel" rows="27" cols=100></textarea>
<input type="submit" value="Uploaden" name="submit">

</form>
</div>
</body>
</html>';
    } else {
        echo "Log eem in jung";
    }
    ?>