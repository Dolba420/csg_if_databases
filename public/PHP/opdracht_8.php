<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/

// Maak een tweedimenionale array, ofwel een array van arrays
$speelveld=array(
                  array('X','O','O'),
                  array('X','O','X'),
                  array('O','O','X')
                );
$winnaar='Niemand';

for ($n=0;$n<3;$n++) {
  if ($speelveld[$n][0]==$speelveld[$n][1] && $speelveld[$n][1]==$speelveld[$n][2]) {
    $winnaar=$speelveld[$n][0];
  }
}

for ($kolom=0; $kolom < 3; $kolom++) { 
    if ($speelveld[0][$kolom] == $speelveld[1][$kolom] && $speelveld[1][$kolom] == $speelveld[2][$kolom]) {
        $winnaar=$speelveld[$kolom][0];
    }
}



echo "<h1>".$winnaar." heeft gewonnen.</h1>";

// Maak een HTML-tabel met opmaak
echo '<table style="border-collapse: collapse; width: 450px; background: white; text-align: center; font-size: 3em;">';

foreach ($speelveld as $rij) {
  // met tr wordt een nieuwe rij in de tabel gemaakt
  echo '<tr style="height: 150px;">';
  foreach ($rij as $kolom) {
    // met td wordt een nieuwe rij in de tabel gemaakt
    echo '<td style="border: 1px solid orange; padding: 5px;">'.$kolom.'</td>';    
  }
  echo '</tr>';
}
// HTML-einde van de tabel
echo '</table>';
/*
echo "<pre>Speelveld:";
print_r($speelveld);
echo "</pre>";

/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>