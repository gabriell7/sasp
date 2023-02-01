<h2>harj7</h2>
<h4>7.1</h4>
<?php
  require "./demot/yhteys.php";
   $sql = "SELECT * FROM `musikkityylit`";
// suoritetaan kysely pdo-yhteydelle
   $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
// tuliko jotain?
 //  print_r($rows);
// tuliko jotain?
 
echo "<table border='1'>";
echo "<tr><th>MusiikkityylitID</th><th>Tyyli</th></tr>";
foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>" . $row["MusikkityylitID"] . "</td>";
  echo "<td>" . $row["Tyyli"] . "</td>";
 
  echo "</tr>";
  
}
echo "</ul>";

?>
<h4></h4>
<?php

 $sql = "SELECT * FROM `Keikkapaikat`";
  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
   echo "<table border=1>";
   
foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>" . $row["KeikapaikkaID"] . "</td>";
  echo "<td>" . $row["Postiosoite"] . "</td>";
   echo "<td>" . $row["Postitoimipaikka"] . "</td>";
    echo "<td>" . $row["Puhelin"] . "</td>";
	echo "<td>" . $row["Lähiosoite"] . "</td>"; 
echo "<td><a href='./harj/delete2.php?id=" . $row["KeikkapaikkaID"] . "'>delete</a> edit</td>";
header('Location: ../index.php?sivu=harj7&kansio=harj');
   echo "</table>";
}   
?>



<?php
 $sql = "SELECT * FROM `esiintyjät` INNER JOIN musikkityylit on `esiintyjät`.musikkityyliID=musikkityylit.musikkityylitID";
  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
   echo "<table border=1>";
   
foreach ($rows as $row) {
   echo "<tr><th>nro</th><th>nimi</th><th>sukunimi</th><th>tyyli</th></tr>";
   echo "<td>" . $row["EsiintyjäID"] . "</td>";
  echo "<td>" . $row["Etunimi"] . "</td>";
   echo "<td>" . $row["Sukunimi"] . "</td>";
echo "<td>" . $row["Tyyli"] . "</td>";
}
echo "</table>";
?>



<h4></h4>
<form method="post">
<input type="text" placeholder="postiosoite" value="" name="postiosoite" /><br />
<input type="text" placeholder="postitoimipaikka" value="" name="postitoimipaikka" /><br />
<input type="text" placeholder="puhelin" value="" name="puhelin" /><br />
<input type="text" placeholder="lahiosoite" value="" name="lahiosoite" /><br />
<input type="submit" value="insert" /><br />
</form>
<?php
if (isset($_POST["postiosoite"], $_POST["postitoimipaikka"], $_POST["lahiosoite"])) {
	echo "testi";
 $postitoimipaikka= $_POST["postitoimipaikka"];
 $puhelin = $_POST["puhelin"];
 $lähiosoite = $_POST["lahiosoite"];
 $postiosoite = $_POST["postiosoite"];
}

 // muuttujien paikalle ? -merkit
 $sql = "INSERT INTO `keikkapaikat` (`postiosoite`, `postitoimipaikka`, `puhelin`,`lähiosoite`) VALUES (?,?,?,?)";
 // kerätään muuttujat taulukkoon:
 $data = array ($postiosoite, $postitoimipaikka, $puhelin, $lähiosoite);
 // suoritetaan sql-lause
 $stmt = $pdo->prepare($sql);
 $stmt->execute($data);
?>