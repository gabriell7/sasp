<?php
 
 require "yhteys2.php";
 if (isset($_POST["Lähiosoite"], $_POST["Postiosoite"], 
   $_POST["Postitoimipaikka"], $_POST["Puhelin"], $_POST["KeikapaikkaID"])) {
     // tuli post 
     echo "testi";
     $Lähiosoite = $_POST["Lähiosoite"];
     $Postiosoite = $_POST["Postiosoite"];
     $Postitoimipaikka = $_POST["Postitoimipaikka"];
     $Puhelin = $_POST["Puhelin"];
     $KeikapaikkaID = $_POST["KeikapaikkaID"];
     $data = array($Lähiosoite, $Postiosoite, $Postitoimipaikka, $Puhelin, $KeikapaikkaID);
     $sql = "UPDATE `keikkapaikat` SET `Lähiosoite`=?, 
         `Postiosoite`=?,  `Puhelin`=?,`Postitoimipaikka`=? WHERE KeikapaikkaID=?";
     $stmt = $pdo->prepare($sql);
     $stmt->execute($data);
 header('Location: ../index.php?sivu=harj7&kansio=harj');
     exit;
 }
 
 if (isset($_GET["id"])){ 
	// tuli get
	$sql = "SELECT * FROM keikkapaikat WHERE KeikapaikkaID=?";
	$data = array($_GET["id"]);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	
	$rows = $stmt->fetchAll();
	//var_dump($rows);
	if (!$rows) {
		echo "No games!";
	}
	else {
		$Lähiosoite = $rows[0]["Lähiosoite"];
		$Postiosoite = $rows[0]["Postiosoite"];
		$Postitoimipaikka = $rows[0]["Postitoimipaikka"];
        $Puhelin = $rows[0]["Puhelin"];
		$KeikapaikkaID = $_GET["id"];
	}
}
 
?>
 <h4></h4>
 <form method="post" >

 <label for="lahiosoite">KeikkapaikkaID</label><br>
<input type="text" name="KeikapaikkaID" value="<?php echo $KeikapaikkaID; ?>" ><br>

<label for="lahiosoite">Lähiosoite</label><br>
<input type="text" name="Lähiosoite" value="<?php echo $Lähiosoite; ?>"><br>

<label for="postiosoite">Postiosoite</label><br>
<input type="text" name="Postiosoite" value="<?php echo $Postiosoite; ?>" ><br>

<label for="postitoimipaikka">Postitoimipaikka</label><br>
<input type="text" name="Postitoimipaikka" value="<?php echo $Postitoimipaikka; ?>"><br>

<label for="puhelin">Puhelin</label><br>
<input type="number" name="Puhelin" value="<?php echo $Puhelin; ?>"><br>

<input type ="submit" value="Lähetä">
<?php
 

