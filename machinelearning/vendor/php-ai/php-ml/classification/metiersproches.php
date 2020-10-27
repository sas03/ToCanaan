<?php
//require_once __DIR__ . '/vendor/autoload.php';
include '../../../../vendor/autoload.php';
use Phpml\Classification\KNearestNeighbors;

/*$name = "zombie";
$name1 = (int) $name;

$user ="trade";
$user1 = (int) $user;

echo $name1 + $user1;*/
$x1 = "rigoureux";
$x2 = "temeraire";
$x3 = "efficace";
$x4 = "voyager";
$x5 = "danser";
$x6 = "football";
$x7 = "handball";
$x8 = "flipper";
$x9 = "coder";
$x10 = "dessiner";
$x11 = "planifier";
$x12 = "etudier";

$y1 = "concevoir et developper";
$y2 = "fort de charactere";
$y3 = "redondant";
$y4 = "matcher";
$y5 = "paris et match";
$y6 = "solitaire";
$y7 = "amical";
$y8 = "ennemi de mes ennemis";
$y9 = "nager";
$y10 = "gestion de projet";
$y11 = "classification";
$y12 = "faire son malin";

$m = array($x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11,$x12);
$n = array($y1,$y2,$y3,$y4,$y5,$y6,$y7,$y8,$y9,$y10,$y11,$y12);

echo "<pre>";
print_r($m);
echo "</pre>";
//array de $m et $inconnu
$push = array();
$i = 0;
$j = 12;
foreach($m as $mx){
  $i = $i + 1;
  $j = $j + 1;
  $strI = strval($i);
  $strJ = strval($j);
  $mx = $strI;
  $intM = intval($mx);
  foreach($n as $nx){
    $nx = $strJ;
    $intN = intval($nx);
  }
  $random = array($intM,$intN);
  //$random = array($mx,$nx);
  array_push($push,$random);
}
/*foreach($m as $mx){
  $i = $i + 1;
  $strI = strval($i);
  $mx = $strI;
  echo $mx;
  array_push($push,$strI);
}*/
echo "<pre>";
print_r($push);
echo "</pre>";

foreach($push as $p){
  foreach($p as $pad){
    echo $pad . " ";
  }
}
//echo $push[10];
/*
                                                  $samples = array();
                                                  foreach($push as $p){
                                                    foreach($p as $pad){
                                                      $intP = intval($pad);
                                                      echo $intP . "<br>";
                                                    }
                                                  }
                                                  */
/*
$samples = array();
foreach($push as $p){
  $intP = intval($p);
  array_push($samples,$p);
}
echo $samples[1];
print_r($samples);*/

//$try = array(13,14,15,16,17,18,19,20,21,22,23,24);

$x1 = "1";
$x2 = "2";
$x3 = "3";
$x4 = "4";
$x5 = "5";
$x6 = "6";
$x7 = "7";
$x8 = "8";
$x9 = "9";
$x10 = "10";
$x11 = "11";
$x12 = "12";

$intX1 = intval($x1);
$intX2 = intval($x2);
$intX3 = intval($x3);
$intX4 = intval($x4);
$intX5 = intval($x5);
$intX6 = intval($x6);
$intX7 = intval($x7);
$intX8 = intval($x8);
$intX9 = intval($x9);
$intX10 = intval($x10);
$intX11 = intval($x11);
$intX12 = intval($x12);

$samples = array([$intX1,$intX2],[$intX3, $intX4],[$intX5, $intX6],[$intX7, $intX8],[$intX9, $intX10],[$intX11, $intX12]);
//$samples = [[$intX1, $intX2], [$intX3, $intX4], [$intX5, $intX6], [$intX7, $intX8], [$intX9, $intX10], [$intX11, $intX12]];
$labels = ['architecte', 'menuisier', 'dessinateur', 'artiste', 'footballeur', 'etudiant'];

$classifier = new KNearestNeighbors($k=1);//default k = 3, 3 nearest neighbors. In this case, k was set to 1
$classifier->train($push, $labels);

echo $classifier->predict([2,13]);

?>
