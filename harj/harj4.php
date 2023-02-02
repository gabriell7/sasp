<?php
if(isset($_POST["rahat"])) {
	// ota muttuja talteen
	$rahat = $_POST ["rahat"];
	// lakske tulos
	$bensaraha = $rahat / 1.55;
	// tulosta tiedot käyttäjälle
	$bensaraha = round($bensaraha * 100)/100; 
	echo "Saat 95:sta ".$bensaraha ." litraa";
}



?>
 <h1>Harjoitus 4</h1>
 <h2> 4.1Bensalaskuri<h2>
 <!-- bensalaskuri
 mieti mitä tietoja käyttäjältä tarvitaam
 -->
<form method ="post">
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
	echo "Saat takaisin $tulos euroa";
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

<h2>4.3 alv</h2>



<form method ="post">
<label for="Tuoteen hinta">Tuoteen hinta </br />
<input type="number" name="hinta" step="0.1" /><br />
<label for ="alvp">alvp </label><br />
<input type= "number" name="alvp" step="0.1" /><br />
<input type="submit" value="Laske" />
</form>
<?php



if(isset($_POST["hinta"],($_POST["alvp"]))) {
	// ota muttuja talteen
	$hinta = $_POST ["hinta"];
	$alvp = $_POST ["alvp"];
	// lakske tulos
	$verollinen = ($hinta * $alvp) /100;
	$kokohinta = $hinta + $verollinen;

	// tulosta tiedot käyttäjälle 
	
	echo "Verollinen hinta $verollinen";
	echo "Kokohinta $kokohinta";
}

?>
<h2>4.4 Valintarakenne</h2>


<form method ="post">
<label for="syote">Syötä luku </br />
<select name="syote">

<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>

</select>

<input type="submit" value="Laske" />
</from>

<?php
if (isset($_POST["syote"])) {
    $syote = $_POST["syote"];
    $luku = rand(1, 10);

    if ($syote == $luku) {
        echo "Onnittelut, arvasit oikein! Luku oli $luku.";
    } else {
        echo "Arvasit väärin. Oikea luku oli $luku.";
    }
}
?>



<h2>4.5 Arvosana</h2>

<form action="harj4.php" method="post">
    Arvosana viimeisestä tentistä:
    <select name="arvosana">
		< <option value="0">Valitse arvosana</option>
        <option value="1" <?php if (isset($_POST['arvosana']) && $_POST['arvosana'] == '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if (isset($_POST['arvosana']) && $_POST['arvosana'] == '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if (isset($_POST['arvosana']) && $_POST['arvosana'] == '3') echo 'selected'; ?>>3</option>
	</select>

    
 <input type="submit" value="Lähetä">
</form>


<?php

if (isset($_POST["arvosana"])) {
    $arvosana = $_POST["arvosana"];

    if ($arvosana == 1) {
        echo "Arvosanasi on 1. Täytyy parantaa.";
    } else if ($arvosana == 2) {
        echo "Arvosanasi on 2. Jatka samaan tahtiin.";
    }else if ($arvosana == 3) {
        echo "Arvosanasi on 3. Erinomainen suoritus!";
}
}
?>

<h2>4.6 </h2>

<form method ="post">
<label for="luku">luku </br />
<input type="number" name="luku" step="0.1" /><br />
<label for ="luku2">luku2 </label><br />
<input type= "number" name="luku2" step="0.1" /><br />
suurempi: <input type="radio" name="valinta" value="suurempi">
pienempi: <input type="radio" name="valinta" value="pienempi">
<input type="submit" value="Valitse" />
</form>


<?php
if (isset($_POST['suurempi'] ,$_POST['pienempi'],$_POST['luku'],$_POST['luku2'])) {
    $suurempi = $_POST["suurempi"];
    $pienempi = $_POST["pienempi"];
	$luku = $_POST["luku"];
    $luku2 = $_POST["luku2"];
   echo "$luku ja $luku2.";

    if ($_POST["valinta"] == "pienempi") {
		echo "Pienempi luku on: " . min($suurempi, $pienempi);
    } elseif ($_POST['valinta'] == 'suurempi') {
        echo "Suurempi luku on: " . max($suurempi, $pienempi);
    }
}
?>
