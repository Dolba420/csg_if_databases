<html>
<head>

    <link rel="stylesheet" href="css/css.css">

</head>

<?php
require('php/logincheck.php');
?>

<nav><h3 class="username"><?php echo $_SESSION['username'];?> (1236)</h3></nav>
<div class="container">
<?php
require('php/moduscontainer.php');
?>
<div class="scherm">
        <div class="spelinstellingen">
            <div class="spelinstellingeninhoud">
                <h3 class="kopjeinstellingen">Beginspeler</h3>
                <select name="begin" id="begin">
                        <option value="bull">Bullseye</option>
                        <option value="willekeurig">Willekeurig</option>
                        <option value="ik">Ik</option>
                        <option value="tegenstander">Tegenstander</option>
                </select>
                <h3 class="kopjeinstellingen">Spel</h3>
                <select name="spel" id="spel">
                        <option value="bull">Classic 501</option>
                        <option value="minigame125">125 minigame</option>
                        <option value="killer">Killer</option>
                </select>
                <h3 class="kopjeinstellingen">Tegenstander</h3>
                <select name="tegenstander" id="tegenstander">
                        <?php
                        echo '<option value="null">Geen recente tegenstanders</option>';
                        ?>
                </select>
                <input type="button" value="Nieuwe tegenstander">
            </div>
        </div>
</div>
</div>
</html>