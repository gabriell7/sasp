<form method="post">
<input type="text" placeholder="name" value="" name="name" /><br />
<input type="text" placeholder="company" value="" name="company" /><br />
<input type="number" min="1900" max="2099" step="1" value="2021" 
  placeholder="year" value="" name="release" /><br />
<input type="submit" value="insert" /><br />
</form>
<?php
 // demo9.php
   // lue mukaan yhteys.php
   require "yhteys.php";
   
   
   
   if (isset($_POST["name"], $_POST["company"], $_POST["release"])) {
 $name = $_POST["name"];
 $company = $_POST["company"];
 $release = $_POST["release"];
 // muuttujien paikalle ? -merkit
 $sql = "INSERT INTO `games` (`name`, `company`, `release`) VALUES (?, ?, ?)";
 // kerätään muuttujat taulukkoon:
 $data = array ($name, $company, $release);
 // suoritetaan sql-lause
 $stmt = $pdo->prepare($sql);
 $stmt->execute($data);
 }
 
// haetaan sql-kyselyllä kaikki pelit
   $sql = "SELECT * FROM games";
// suoritetaan kysely pdo-yhteydelle
   $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
// tuliko jotain?
 //  print_r($rows);
// tuliko jotain?
//print_r($rows);
// käydään kaikki tulokset läpi
   echo "<ul>";
   foreach($rows as $row) {
   echo "<li>" . $row["name"] . "</li>";
   }
   echo "</ul>";
   echo "<table border='1'>";
   
   echo "<tr><th>gameid</th><th>name</th><th>company</th><th>release</th></tr>";
foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>" . $row["gameid"] . "</td>";
  echo "<td>" . $row["name"] . "</td>";
  echo "<td>" . $row["company"] . "</td>";
  echo "<td>" . $row["release"] . "</td>";
  echo "<td><a href='./demot/delete.php?id=" . $row["gameid"] . "'>delete</a><a href='./demot/edit.php?id=" . $row["gameid"] . "'> edit</a></td>";
  echo "</tr>";
}
echo "</table>";
?>



 
 
 
 

