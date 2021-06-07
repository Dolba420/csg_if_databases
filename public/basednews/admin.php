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
if(isset($_SESSION['gebruiker'])){

echo "Welkom " . $_SESSION['gebruiker'];
echo '
<form action="saveartikel.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  
    <input type="text" name="headline" placeholder="Titel">
    <br>
    <textarea name="bericht" rows="10" cols=59></textarea><br>
<input type="submit" value="Upload Image" name="submit">

</form>
</body>
</html>';
}
else{
    echo "Log eem in jung";

}
?>