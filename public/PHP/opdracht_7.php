<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/

      $fibonacci=array(0,1);
      for ($n=0; $n < 28; $n++) { 
          $fibonacci[$n+2] = $fibonacci[$n] + $fibonacci[$n+1];
      }
echo count($fibonacci);
      // Een while bevat een voorwaarde. Zolang er uit de voorwaarde true (WAAR) komt gaat de herhaling verder
      $n=0;
      while ($fibonacci[$n]<100) {
        $n++;            
      }
      echo "<h2>Er zijn $n Fibonaccigetallen kleiner dan 100.</h2>";      
      
      // een if met een elseif en een else
      foreach($fibonacci as $getal) {
        if($getal % 2==0) {
          echo "$getal ja(2) |";
        }
        elseif($getal % 3==0) {
          echo "$getal ja(3) |";
        }
        else {
           echo "$getal NEE |";
        }
      }
      echo "<br>";

      $n=0;
      // $deel2, $deel3 en $doorgaan zijn booleans
      $deel2=false;
      $deel3=false;
      $doorgaan=true;
      // de while heeft aan de boolean $doorgaan genoeg. Er hoeft dus niet perse een vergelijking te staan
      while ($doorgaan) {
        $n++;
        if ($fibonacci[$n] % 2==0) {
          $deel2=true;
        }
        if ($fibonacci[$n] % 3==0) {
          $deel3=true;
        }
        // EN schrijf je als &&, OF schrijf je als ||
        if ($deel2 || $deel3) {
          echo "<br>".$fibonacci[$n]." is deelbaar door 2 OF 3.";
        }        
        if ($deel2 && $deel3) {
          $doorgaan=false;
        }
        $deel2=false;
        $deel3=false;
      }
      echo "<h2>".$fibonacci[$n]." is het eerste fibonaccigetal(boven 0) dat deelbaar is door 2 EN 3!</h2>";

/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>