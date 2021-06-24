<!DOCTYPE html>
<html>
<?php
require("php/database.php");
require("php/head.php");
require("php/header.php");
?>

<body>
    <div class="content">
        <?php
        $sql = "SELECT * FROM berichten WHERE id=" . $_GET['artikel'];
        $records = mysqli_query($DBverbinding, $sql);
        $artikel = [];
        if (mysqli_num_rows($records) > 0) {
            while ($dbid = mysqli_fetch_assoc($records)) {
                echo '<p>' . $dbid["datum"] . '<p>';
                echo '<div class="headlinepicture"><img src="' . $dbid["image"] . '" style="width:100%;"/></div>';
                echo '<h2>' . $dbid["headline"] . '</h2>';
                echo '<p>' . $dbid["bericht"] . '</p>';
            }
        }

        ?>

    </div>

    <?php
    require("php/comments.php");
    require("php/footer.php");
    ?>
</body>

</html>