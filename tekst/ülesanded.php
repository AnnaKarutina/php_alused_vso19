<?php
/**
 * file name: ylesanded.php;
 * autor: anna.karutina;
 * date: 03.12.2019;
 */

//Kasutaja lisab vormi nime, seda näiteks suured ja väikesed tähed läbisegi. Sina kood tervitab teda kenasti nimepidi, kus nimi algab suure algustähega.
//Näiteks: sisend–>mARiO; väljund–>Tere, Mario!

$nimi = $_GET['nimi'];
$nimi = strtolower($nimi); // nimi on ainult väikestest tähtedest
$nimi = ucfirst($nimi); // esimene täht on suur
echo 'Tere, '.$nimi.'!'; // moodustame ja väljastame tervitus
echo '<hr>';

//Kuna on teada, et PHP käsitleb teksti kui massiivi, siis peaks saama seda tsükli abil nö. tükeldada. Ülesandeks on etteantud teksti iga tähe järgi lisada punkt.
//Näiteks: sisend–>stalker; väljund–>S.T.A.L.K.E.R.

$sisend = $_GET['sisend'];
for($indeks = 0; $indeks < strlen($sisend); $indeks++){
    $symbol = strtoupper($sisend[$indeks]); // teisendame täht suureks
    echo $symbol.'.'; // väljastame koos punktiga
}
echo '<hr>';

//Koosta tekstiväli, mis kuvab kasutaja sisestatud sõnumeid. Kasutaja ropud sõnad asendatakse tärnidega.
//Näiteks: sisend–>Sa oled täielik noob; väljund–>Sa oled täielik ***

$roppSonad = array('noob', 'kurat'); // roppsõnade massiiv
$lause = $_GET['lause']; // kasutaja sisend
$lause = strtolower($lause); // teisendame kõik väikesteks tähtedeks
// iga roppsõna kohta, mis meie massiivis on
foreach ($roppSonad as $roppSona){
    // moodustame asendussõna vastava pikkusega
    $asendus = '';
    for($kord = 0; $kord < strlen($roppSona); $kord++){
        $asendus .= '*';
    }
    // otsime, millisest indeksist hakkab pihta roppsõna meie lause sees
    $roppSonaIndex = strpos($lause, $roppSona, 0);
    // kui sõna on leitud
    if($roppSonaIndex !== false ){
        // teeme vastav asendus
        $lause = substr_replace($lause, $asendus, $roppSonaIndex, strlen($roppSona));
    }
}
// teeme tagasi lause algava suure tähega
$lause = ucfirst($lause);
// väljastame lause
echo $lause;
echo '<hr>';

//Kasutajalt saadud eesnime ja perenime põhjal luuakse talle email lõpuga @hkhk.edu.ee. Kusjuures täpitähed asendatakse ä->a, ö->o, ü->y, õ->o ja kogu email on väikeste tähtedega
//Näiteks: sisend–>Ülle ja Doos; väljund–>ylle.doos@hkhk.edu.ee
$nimiJaPerenimi = $_GET['nimijaperenimi'];
$asendus = array(
    'ä' => 'a',
    'ö' => 'o',
    'ü' => 'u',
    'õ' => 'o',
    'Ä' => 'A',
    'Ö' => 'O',
    'Ü' => 'U',
    'Õ' => 'O',
);
foreach ($asendus as $otsi=>$asenda){
    $nimiJaPerenimi = str_replace($otsi, $asenda, $nimiJaPerenimi);
}
$tyhikuIndeks = strpos($nimiJaPerenimi, ' ', 0);
$nimi = strtolower(substr($nimiJaPerenimi, 0, $tyhikuIndeks));
$nimiJaPerenimi = substr($nimiJaPerenimi, $tyhikuIndeks+1);
$tyhikuIndeks = strpos($nimiJaPerenimi, ' ');
$perenimi = strtolower(substr($nimiJaPerenimi,$tyhikuIndeks+1));
$email = $nimi.'.'.$perenimi.'@khk.ee';
echo $email;
echo '<hr>';
// regulaaravaldistega
$nimiJaPerenimi = $_GET['nimijaperenimi'];
$asendus = array(
    'ä' => 'a',
    'ö' => 'o',
    'ü' => 'u',
    'õ' => 'o',
    'Ä' => 'A',
    'Ö' => 'O',
    'Ü' => 'U',
    'Õ' => 'O',
);
foreach ($asendus as $otsi=>$asenda){
    $nimiJaPerenimi = str_replace($otsi, $asenda, $nimiJaPerenimi);
}
$eesnimiRE = '/^[A-Z][a-z]* /';
$perenimiRE = '/ [A-Z][a-z]*/';
preg_match($eesnimiRE, $nimiJaPerenimi, $eesnimi);
preg_match($perenimiRE, $nimiJaPerenimi, $perenimi);
if(!empty($eesnimi) and !empty($perenimi)){
    $kasutaja = strtolower(trim($eesnimi[0])).'.'.strtolower(trim($perenimi[0]));
    echo $kasutaja.'@khk.ee';
}


