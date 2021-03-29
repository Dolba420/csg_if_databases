<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/

$priem=array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113);
/*echo '<h1>Het vierde element van de array $priem is: ' . $priem[4] . "</h1>";*/


//echo count($priem);
$leerling=array();
$leerling["naam"] = "Dolba";
$leerling["geboortejaar"] = 2003;
$leerling["leerlingnummer"] = 151568;
        echo '<pre>';
        print_r($leerling);
        echo  '</pre>';

$alan=array();
$alan["naam"] = "Alan Turing";
$alan["geboortejaar"]=1912;
/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>