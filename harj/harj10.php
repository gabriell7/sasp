<h2>Harjoitus 10<h2>
<h4>10.1</h4>
<?php
require "./demot/yhteys.php";
if (isset($_POST["nimi"], $_POST["paivays"])) {
	echo "teksti";
 $nimi= $_POST["nimi"];
 $paivays = $_POST["paivays"];
 $sql = "INSERT INTO `games` (`nimi`, `paivays`, ) VALUES ( ?, ?)";
 // kerätään muuttujat taulukkoon:
 $data = array ($nimi, $paivays,);
 // suoritetaan sql-lause
 $stmt = $pdo->prepare($sql);
 $stmt->execute($data);
}

$sql= "SELECT * FROM `h10_tapahtumat`";
 $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
   
     echo "<table border=1>";
   
   echo "<tr><th>tapahtumaID</th><th>nimi</th><th>paivays</th>";
  
foreach ($rows as $row) {
	echo "<tr>";
	echo "<td>" . $row["tapahtumaID"] . "</td>";
	echo "<td>" . $row["nimi"] . "</td>";
	echo "<td>" . $row["paivays"] . "</td>";
	echo "<td><a href='./harj10/delete10.php?id=" . $row["tapahtumaID"] . "'>delete</a><a href='./harj10/edit10.php?id=" . $row["tapahtumaID"] . "'> edit</a></td>"; 
	$sql = "INSERT INTO `tapahtuma` (`nimi`, `paivays`) VALUES (?, ?)";

	echo "</tr>";
}
echo "</table>";

?>

<form method="post">
<input type="text" placeholder="nimi" value="" name="nimi" /><br />
<input type="date" placeholder="paivays" value="" name="paivays" /><br />
<input type="submit" value="insert" /><br />
</form>