<!DOCTYPE html>
<html>
<?php
require("php/head.php");
?>
<body>

<div class="header">
    <a class="red">Verwijder artikelen</a>
    <a>Nieuw artikel</a>
</div>
<br>
<?php
session_start();
echo "Welkom " . $_SESSION['gebruiker'];

?>
<!--
<form action="saveartikel.php" method="POST">
    <input type="file" name="picture">
    <br>
    <input type="text" name="headline" placeholder="Titel">
    <br>
    <textarea name="bericht" rows="10" cols=59></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>
-->
<form action="saveartikel.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  
    <input type="text" name="headline" placeholder="Titel">
    <br>
    <textarea name="bericht" rows="10" cols=59></textarea><br>
<input type="submit" value="Upload Image" name="submit">

</form>
</body>
</html>