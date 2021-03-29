<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/

$leerling=array();
$leerling["name"] = "Dolba";
$leerling["geboortejaar"] = 2003;
$leerling["leerlingnummer"] = 151568;
        echo '<pre>';
        print_r($leerling);
        echo  '</pre>';



$leerling=array('nr' => 123456, 'voornaam' => 'Alan', 'achternaam' => 'Turing', 'geboortejaar'=>1913);

echo "<pre>Leerling:";
print_r($leerling);
echo "</pre><br>";

echo $leerling["name"] . " werd geboren in " . $leerling["geboortejaar"];

/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>