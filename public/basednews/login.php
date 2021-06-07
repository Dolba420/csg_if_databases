 <html>
 <?php
 require('php/database.php');
 ?>
 <body>
 <?php
 if(isset($_POST['username'])){
$sql = 'SELECT * FROM `accounts` WHERE accountnaam="' . $_POST['username'] . '"';
$ingelogt = false;
$records = mysqli_query($DBverbinding, $sql);
if (mysqli_num_rows($records) > 0) {
    while($dbid = mysqli_fetch_assoc($records)) {
        if($dbid['password'] == $_POST['password']){
            $ingelogt = true;
            session_start();
            $_SESSION["log"] = true;
            $_SESSION["gebruiker"] = $_POST['username'];
            echo "Welkom " . $_SESSION['gebruiker'];
            echo '<a href="admin.php"><br>ga naar het adminscherm </a>';
        }
        else{
            echo "Combinatie is onjuist";
        }
    }
}
 }
 else{
     echo "Geen gebruiker aangegeven";
 }
?>

</body>
 </html>