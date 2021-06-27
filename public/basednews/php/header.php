<?php
session_start();
?>
<div class="header">
    <a href="index.php"><img src="logo/basednews.png" class="logo"/></a>
    <div class="header-right">
        <a class="menubtn" href="<?php 
        if($adminscreen == true){
            echo "admin.php";
            $ingelogt = "Nieuw artikel";
        }
        else{
        if (isset($_SESSION['gebruiker'])) {
                        echo "admin.php";
                        $ingelogt = "Admin";
                    } else {
                        echo "loginscreen.php";
                        $ingelogt = "Login";
                    }} ?>"><?php echo $ingelogt ?></a>
        <?php 
        if($adminscreen == true){
        echo '<a class="menubtn" href="delete.php">Verwijder artikelen</a>';
        }
        else if (isset($_SESSION['gebruiker'])) {
            echo '<a class="menubtn" href="loguit.php">uitloggen</a>';
        }?>
    </div>
</div>