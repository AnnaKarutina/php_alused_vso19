<?php
/**
 * file name: opilased.php;
 * autor: anna.karutina;
 * date: 10.01.2020;
 */

$vso19 = array(
  'Anne-mari',
  'Andre',
  'Rene',
  'Martin',
  'Mairit',
  'Erko',
  'Kerli',
  'Hanna-Liisa',
  'Jaana'
);

$opilasteArv = count($vso19);
echo 'VSo19 rühmas on '.$opilasteArv.' õpilasi<br>';
echo 'Need on:<br>';
for($i = 0; $i < $opilasteArv; $i++){
  echo $vso19[$i].'<br>';
}
echo '<hr>';
foreach ($vso19 as $opilane){
  echo $opilane.'<br>';
}

$jaana = array(
  'eesnimi' => 'Jaana',
  'perenimi' => 'Šeffer'
);
echo '<pre>';
print_r($jaana);
echo '</pre>';
foreach ($jaana as $element => $vaartus){
  echo $element.' - '.$vaartus.'<br>';
}