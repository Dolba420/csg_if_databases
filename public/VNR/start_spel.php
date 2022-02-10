<html>
<head>
<?php
require('php/logincheck.php');
?>
    <link rel="stylesheet" href="css/css.css">

</head>
<body>
<h1>Wie gooide het dichts bij de Bullseye</h1>
<div class="startspeler" id="startspeler">
    
    <div class="speler1" id="speler1">
        <h1 class="spelertekst"><?php echo $_SESSION['username']; ?></h1>
    </div>
    <div class="speler2" id="speler2">
    <h1 class="spelertekst"><?php echo $_POST['tegenstander']?></h1>
    </div>
</div>


<!--
<table>
<?php 

    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>
</table>
-->
</body>
</html>
