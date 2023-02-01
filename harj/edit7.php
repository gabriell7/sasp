<?php
require "yhteys.php";
if (isset($_POST["KeikapaikkaID"], $_POST["Postiosoite"], 
  $_POST["Postitoimipaikka"], $_POST["Puhelin"], $_POST["Lähiosoite"])) {
	// tuli post 
	$Keikapaikkaid= $_POST["Keikapaikkaid"];
	$Postitoimipaikka = $_POST["Postiosoite"];
	$release = $_POST["Postitoimipaikka"];
    $Puhelin = $_POST["Puhelin"];
    $Lähiosoite = $_POST["Lähiosoite"];
	$data = array($Keikapaikkaid, $Postiosoite, $Postitoimipaikka, $Puhelin, $Lähiosoite);
	$sql = "UPDATE `keikkapaikat` SET `Postiosoite`=?, 
		`Postitoimipaikka`=?, `Puhelin`, `Lähiosoite`=? WHERE Keikkapaikatid=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
header('Location: ../index.php?sivu=harj9&kansio=harj');
	exit;
}


if (isset($_GET["id"])){
	// tuli get
	$sql = "SELECT * FROM keikapaikka WHERE Keikapaikkaid=?";
	$data = array($_GET["id"]);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	
	$rows = $stmt->fetchAll();
	//var_dump($rows);
	if (!$rows) {
		echo "Ei keikkoja!";
	}
	else {
		$Keikapaikkaid = $rows[0]["id"];
		$Postitoimipaikka = $rows[0]["Postitoimipaikka"];
		$release = $rows[0]["release"];
		$Lähiosoite = $_GET["Lähiosoite"];
	}
}

?>

<h2>Edit keikkapaikat</h2>
<form method="post">
<input type="text" value="<?php echo $Postitoimipaikka; ?>" name="Postitoimipaikka" /><br />
<input type="text" value="<?php echo $release; ?>" name="release" /><br />
<input type="number" value="<?php echo $release; ?>" name="release" /><br />
<input type="hidden" name="Keikapaikkaid" value="<?php echo $Keikapaikkaid; ?>" />
<input type="submit" value="Save" /><br />
</form>