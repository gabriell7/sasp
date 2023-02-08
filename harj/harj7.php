<h2>harj7</h2>
<h4>7.1</h4>
<?php
  require "yhteys2.php";
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
echo "</table>";

?>
<h4>7.2</h4>
<?php

 $sql = "SELECT * FROM `keikkapaikat`";
  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();

   echo "<table border=1>";
   echo "<tr><th>KeikkapaikkaID</th><th>Postiosoite</th><th>Postitoimipaikka</th><th>Puhelin</th><th>Lähiosoite</th><th>Toiminnot</th></tr>";
foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>" . $row["KeikapaikkaID"] . "</td>";
  echo "<td>" . $row["Postiosoite"] . "</td>";
   echo "<td>" . $row["Postitoimipaikka"] . "</td>";
    echo "<td>" . $row["Puhelin"] . "</td>";
   echo "<td>" . $row["Lähiosoite"] . "</td>"; 
echo "<td><a href='./harj/delete2.php?id=" . $row["KeikapaikkaID"] . "'>delete</a> <a href='./harj/editkeikkapaikka.php?id=" . $row["KeikapaikkaID"] . "'>edit</a></td>";
  echo "</tr>";
}  
echo"</table>";
  ?>

<?php 


//header('Location: ../index.php?sivu=harj7&kansio=harj');

    

?>



<?php

?>
<h4>7.3</h4>
<?php
 $sql = "SELECT * FROM `esiintyjät` INNER JOIN musikkityylit on `esiintyjät`.musikkityyliID=musikkityylit.musikkityylitID";
  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
   echo "<table border=1>";
   echo "<tr><th>nro</th><th>nimi</th><th>sukunimi</th><th>tyyli</th></tr>";
foreach ($rows as $row) {
  echo "<tr>";
   echo "<td>" . $row["EsiintyjäID"] . "</td>";
  echo "<td>" . $row["Etunimi"] . "</td>";
   echo "<td>" . $row["Sukunimi"] . "</td>";
echo "<td>" . $row["Tyyli"] . "</td>";
echo "</tr>";
}
echo "</table>";
?>










<h4>7.4 Keikkapaikan lisääminen</h4>

<form method="post">
<input type="text" placeholder="postiosoite" value="" name="Postiosoite" /><br />
<input type="text" placeholder="postitoimipaikka" value="" name="Postitoimipaikka" /><br />
<input type="text" placeholder="puhelin" value="" name="Puhelin" /><br />
<input type="text" placeholder="lahiosoite" value="" name="Lähiosoite" /><br />
<input type="submit" value="insert" /><br />
</form>


<?php
 if (isset($_POST["Postiosoite"], $_POST["Postitoimipaikka"], $_POST["Puhelin"], $_POST["Lähiosoite"])) {
   $Postiosoite = $_POST["Postiosoite"];
   $Postitoimipaikka = $_POST["Postitoimipaikka"];
   $Puhelin = $_POST["Puhelin"];
   $Lähiosoite = $_POST["Lähiosoite"];
   // muuttujien paikalle ? -merkit
   $sql = "INSERT INTO `keikkapaikat` (`Postiosoite`, `Postitoimipaikka`, `Puhelin`, `Lähiosoite`) VALUES (?, ?, ?, ?)";
   // kerätään muuttujat taulukkoon:
   $data = array ($Postiosoite, $Postiosoite, $Puhelin, $Lähiosoite);
   // suoritetaan sql-lause
   $stmt = $pdo->prepare($sql);
   $stmt->execute($data);
   }

   $sql = "SELECT * FROM keikkapaikat";
   $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();


