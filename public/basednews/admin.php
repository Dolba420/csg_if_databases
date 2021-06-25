<!DOCTYPE html>
<html>
<?php
require("php/head.php");
require("php/database.php");
?>

<body>
<?php
require("php/header.php");
$adminscreen = true;
?>
    <!--<div class="header">
        <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360" /></a>
        <div class="adminnav">
            <a href="delete.php">Verwijder artikelen</a>
            <a href="admin.php">Nieuw artikel</a>
        </div>
    </div>-->

    <?php
    session_start();


    ?>

    <?php
    if (isset($_SESSION['gebruiker'])) {
        echo '<div class="maakartikel">Welkom ' . $_SESSION['gebruiker'];
        echo '
<form action="saveartikel.php" method="post" enctype="multipart/form-data">
  Foto:
  <input type="file" name="fileToUpload" id="fileToUpload">
  
    <input type="text" name="headline" placeholder="Titel"/>
    
    <textarea style="resize: none;" name="bericht" rows="27" cols=100></textarea>
<input type="submit" value="Uploaden" name="submit">

</form>
</div>
</body>
</html>';
    } else {
        echo "Log eem in jung";
    }
    ?>