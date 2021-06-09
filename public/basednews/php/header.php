<?php  
session_start();
?>
<div class="header">
  <a href="index.php" class="logo"><img src="logo/basednews.png" height="110" width="360"></a>
  <div class="header-right">
<div class="dropdown">
  <a href="<?php if(isset($_SESSION['gebruiker'])){ echo "admin.php"; $ingelogt = "Admin";} else{ echo "loginscreen.php"; $ingelogt = "Login";}?>"><?php echo $ingelogt?></a>
  <?php if(isset($_SESSION['gebruiker'])){ echo '<a href="loguit.php">Log uit</a>';}?>
</div>
  </div>
</div>