<?php
require "./partials/alku.php";
// jos ei olla kirjauduttu niin näytä kirjautumislomale
//
// Harjoitua 9 - kirjautuminen sivustolle
//

session_start();
$ok = false;
// Tähän väliin tarvitaan lomake käsittelijä
if (isset($_COOKIE{"ok"})) {
	$ok = $_COOKIE["ok"];
}
if (isset($_POST ["password"])) {
	if ($_POST ["password"] == "salasana") {
  // käyttäjä antoi oikean salasanan
setcookie("ok",true, time() +1800);
echo" tunnus oikein!";
$ok = true;

}
else {
   
echo "Tunnus väärin :(";
}
}
if (!$ok) {
?>
<form method="post">
<label for="password"> Syötä salasana</label><br />
<input type="password" name="password" /><br />
<input type="submit" value="Kirjaudu" />
</form>
<?php
}
else {
	
//---- ollaan kirjauduttu 
require "./partials/navi.php";

// navin jälkeen ulos kirjautuminen



if(isset($_GET["sivu"])) $sivu = htmlentities($_GET["sivu"]);
else $sivu = "demo1"; //oletusarvo, jos ei pyyntöä

if(isset($_GET["kansio"])) $kansio = htmlentities($_GET["kansio"]);
else $kansio = "demot";

$sallitut = array("demo1","demo2","demo3","demo4","demo4_lomakkeenkasittelija","demo5","demo6","demo7","demo8","demo9","demo10","demo11","demo12","demo13","harj1","harj2","harj3","harj4","harj5","harj6","harj7","harj7b","harj8","harj9","harj10","harj11","harj12","harj13","harj14","harj15","sqlharj2","demo12b","demo12c","demo16","demo16b","harjoitustyo2","xmlharj1","xmlharj2");

if(in_array($sivu,$sallitut)) {
    $polku = "./$kansio/$sivu.php";
	require $polku;
    echo "<h3>Lähdekoodi</h3>";
    echo highlight_file($polku,1);
}
/*******************
Tähän väliin sijoitetaan ohjelmakoodi, joka lukee pyynnön mukaisen sisällytettävän tiedoston,
 tarkistaa, että sen saa sisällyttää, tulostaa työn ja samalla lähdekoodin ruudulle.
********************/
}
require "./partials/loppu.php";


?>
