<html>
<head>

    <link rel="stylesheet" href="css/css.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<?php
require('php/logincheck.php');
?>

<script>
    if (beginmodes = "ik") {
        beginspeler = 0;
    }
    if (beginmodes = "tegenstander") {
        beginspeler = 1;
    }
</script>

<nav><h3 class="username"><?php echo $_SESSION['username'];?> (1236)</h3></nav>
<div class="container">
<?php
include 'php/moduscontainer.php';
?>
<div class="scherm">
        <div class="statistiekenscherm">
            <div class="statinhoud">
            <h1>Regels en Veiligheid</h1>
            <h3 class="tussenkopjeveiligheid">Algemeen</h3>
            <p class="tekstveiligheid">Voordat de partij begint gooien beide spelers een pijl. De speler die het dichts bij de bullseye gooit begint. Als de eerste werper in de bullseye gooit mag deze pijl uit het bord worden verwijderd om het voor de volgende speler makkelijker te maken. Als beide spelers in de bullseye gooien moet er door beide spelers opnieuw worden gegooid.
            Elke keer dat je aan de beurt bent gooi je alle drie de pijlen, tenzij je na je eerste of tweede pijl uitgooit.
            Pijlen die uit het bord vallen voordat de werper ze eruit haalt leveren elk 0 punten op en mogen niet opnieuw gegooid worden.
            Dartpjilen worden om de beurt gegooid.
            Een dartpijl mag niet zwaarder dan 50 gram of langer dan 30.5 cm zijn
            De afstand van de oche tot aan het bord is 2.37 meter. Dit is gemeten vanaf de voorkant van het bord tot de lijn waar je voeten tegenaanzet
            De hoogte waar je het bord ophangt is 1.73 meter. Dit is gemeten vanaf de grond tot de bullseye.</p>
            <h3 class="tussenkopjeveiligheid">Standard 501</h3>
            <p class="tekstveiligheid">Dit spel wordt met z’n tweeën gespeeld. 
            Beide spelers beginnen met 501 punten en gooit om de beurt drie darts naar het beurt. 
            Elke beurt krijgen de spelers kans om punten te behalen. Deze worden van het totaal aantal punten van hun afgetrokken.
            De speler die als eerste precies nul bereikt wint. Echter, de laatste worp moet een dubbel zijn, dit is de buitenste ring op het bord. De speler krijgt dan 2x het aantal punten van het nummer.
            Er is ook een kleinere binnenste ring, dit levert 3x het aantal punten van het nummer op
            Als iemand zou uitkomen na z’n beurt op 1 dan heeft deze speler in z’n beurt 0 punten gehaald en begint hij z’n volgende beurt weer op hetzelfde aantal punten.</p>
            <h3 class="tussenkopjeveiligheid">125 minigame</h3>
            <p class="tekstveiligheid">Dit spel wordt met elkaar gespeeld in plaats van tegen elkaar. 
            Het spel begint met 125 punten die moeten worden weggegooid binnen 9 pijlen. De eerste persoon die gooit, gooit drie pijlen zoals altijd, daarna gooit de ander 3 en daarna de eerste weer 3. Net zoals bij de standaard 501 moet de laatste pijl een dubbel zijn om uit te gooien. Als het de spelers niet is gelukt om de punten weg te gooien wordt de ronde daarna gespeeld met 1 punt minder, als het de spelers wel is gelukt wordt de ronde daarna gespeeld met 2 punten meer. Ook begint elke ronde de speler die de ronde daarvoor niet begon.
            </p>
            <h3 class="tussenkopjeveiligheid">Veiligheid</h3>
            </div>
        </div>

</div>

</html>



