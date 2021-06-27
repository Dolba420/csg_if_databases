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
                echo '<h1>' . htmlspecialchars($dbid["headline"]) . '</h1>';
                echo '<p>Door: <strong>' . htmlspecialchars($dbid["auteur"]) . '</strong></p>';
                echo '<p>Geschreven op: <strong>' . htmlspecialchars($dbid["datum"]) . '</strong></p>';
                echo '<div class="headlinepicture"><img src="' . htmlspecialchars($dbid["image"]) . '"/></div>';
                echo '<p>' . htmlspecialchars($dbid["bericht"]) . '</p>';
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