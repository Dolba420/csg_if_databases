<?php
session_start();
unset($_SESSION["username"]);
header("Location:index.php");
session_unset();
session_destroy();
?>