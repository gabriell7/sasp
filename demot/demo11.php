<h1>Demo 11</h1>
<h2>11.1 salasanan suojaus</h2>
<?php
// password_hash ja password_verify
$salasana = "salasana";
$apumuuttuja = "salainen";

$salattu = password_hash($salasana, PASSWORD_DEFAULT);
echo"salattu: " . $salattu . "<br />";
if(($salattu)) echo "Ovat samat<br>";
else echo "Eivät osu<br>";


?>

<h2>11.2 filter_var</h2>
<?php
$lause = "<h1>Hei! Keuinka voin tänään?</h1>";
echo $lause;
$sanitoidutmerkit = filter_var($lause,
FILTER_SANITIZE_STRING);
ECHO $sanitoidutmerkit;
?>
<h2> 11.3 filter_var - kokonaisuus</h2>
<?php
$muuttuja = "2020-1-29";
if (filter_var($muuttuja, FILTER_VALIDATE_URL)) {
	ECHO "ON VALIDI URL";
}
else {
	echo "ei ole validi url";
}
?>

<h2> 11.5 filter_var - sähköposti</h2>
<?php
$muuttuja = "som/E/O()ne@@example/.com";
 $sanitoitu = filter_var($muuttuja,
 FILTER_SANITIZE_EMAIL);
 if(filter_var($sanitoitu, FILTER_VALIDATE_EMAIL)) {
	 echo "$sanitoitu validi sähköposti";
 }
 else {
	 echo "$sanitoitu ei ole validi sähköposti";
 }
 ?>
 
 <h2>11.6 filter_var - kokonaisluku ja väli</h2>
 <?php
 $luku = 75 ;
 if (filter_var($luku, FILTER_VALIDATE_INT, ARRAY("options"
 =>array("min_range"=>0, "max _range"=>100)))) {
	 echo "$luku on välillä 0-100";
 }
 else {
	 echo "$luku ei ole välillä 0-100";
 }
 ?>
	