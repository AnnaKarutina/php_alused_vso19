<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>06 - PHP - Vormid</title>
</head>
<body>
<h1>Kujundid</h1>
<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Silindri raadius <input type="text" name="sr"><br>
  Silindri kõrgus <input type="text" name="sk"><br>
  <!--    Toode 2 <input type="text" name="t2"><br>-->
  <!--    Toode 3 <input type="text" name="t3"><br>-->
  <input type="submit" value="Saada">
    <hr>
</form>
</body>
</html>
<?php
function silindriRuumala($raadius, $korgus){
  $pohjaPindala = pi() * $raadius * $raadius;
  $ruumala = $pohjaPindala * $korgus;
  return $ruumala;
}
echo '<pre>';
print_r($_GET);
echo '</pre>';

$sr = $_GET['sr'];
$sk = $_GET['sk'];

if($sr == '' or $sk == ''){
    echo 'Tuleb sisestada kõik andmed!<br>';
} else {
  $silindiRuumala = silindriRuumala($sr, $sk);
  echo 'Silinder raadiusega '.$sr.' ja kõrgusega '.$sk.' on ruumalaga '.$silindiRuumala.'<br>';
}
