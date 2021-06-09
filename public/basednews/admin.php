<!DOCTYPE html>
<html>
<?php
require("php/head.php");
?>

<body>

    <div class="header">
        <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360"></a>
        <div class="adminnav">
            <a class="red">Verwijder artikelen</a>
            <a>Nieuw artikel</a>
        </div>
    </div>
    <br>
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
  <br><br>
    <input type="text" name="headline" placeholder="Titel">
    <br><br>
    <textarea style="resize: none;" name="bericht" rows="27" cols=100></textarea><br>
<input type="submit" value="Uploaden" name="submit">

</form>
</div>
</body>
</html>';
    } else {
        echo "Log eem in jung";
    }
    ?>