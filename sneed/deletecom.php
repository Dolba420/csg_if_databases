<?php
require("php/database.php");
require("php/head.php");
require("php/header.php");
?>
<body>
<?php
session_start();
    if(isset($_SESSION['gebruiker'])){
            $sql = 'DELETE FROM `comments` WHERE commentid=' . $_GET['com'];
            $records = mysqli_query($DBverbinding, $sql);
            echo "<p style='margin-left: 20px;'>Comment verwijderd</p>'";
            echo "<head><meta http-equiv='refresh' content='2; URL=index.php'></head>";
    }
    else{
        echo "<p style='margin-left: 20px;'>log eerst in</p>";
    }
?>
</body>