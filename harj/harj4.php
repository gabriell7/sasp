<?php
if(isset($_POST["rahat"])) {
	// ota muttuja talteen
	$rahat = $_POST ["rahat"];
	// lakske tulos
	$bensaraha = $rahat / 1.5;
	// tulosta tiedot käyttäjälle
	echo "Saat 95:sta $besamaaraa litraa";
}



?>
 <h1>Harjoitus 4</h1>
 <h2> 4.1Bensalaskuri<h2>
 <!-- bensalaskuri
 mieti mitä tietoja käyttäjältä tarvitaam
 -->
<form>
<label for ="rahat">Anna rahamäärä:</label><br />
<input type="number" name="rahat" step="0.1"/><br />
<input type="submit" value="Laske" />
</form>
<?php
//harj 4.2 käsittelijä 
if (isset($_POST["ostokset"], $_POST["summa"])){
	$ostokset = $_POST ["ostokset"];
	$summa = $_POST["summa"];
	$tulos = $summa - $ostokset;
	echo "tulos on $tulos";
}

?>
<h2>4.2 loppusumma</h2>
<!-- Bensalaskuri
mieti mitä tietoja käyttäjältä tarvitaan
--->
<form method ="post">
<label for="ostokset">Ostoksen hinta </br />
<input type="number" name="ostokset" step="0.1" /><br />
<label for ="summa">Anna rahamäärä </label><br />
<input type= "number" name="summa" step="0.1" /><br />
<input type="submit" value="Laske" />
</form>

<h2>4.5 Valintarakenne</h2>
<form method ="post">
<label for="arvosana">Viimeisen kokeen arvosana </br />
<select name="arvosana">

<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
