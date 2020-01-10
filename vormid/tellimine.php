<?php
/**
 * file name: tellimine.php;
 * autor: anna.karutina;
 * date: 10.01.2020;
 */
function silindriRuumala($raadius, $korgus){
  $pohjaPindala = pi() * $raadius * $raadius;
  $ruumala = $pohjaPindala * $korgus;
  return $ruumala;
}

$sr = $_GET['sr'];
$sk = $_GET['sk'];

$silindiRuumala = silindriRuumala($sr, $sk);
echo 'Silinder raadiusega '.$sr.' ja kõrgusega '.$sk.' on ruumalaga '.$silindiRuumala.'<br>';