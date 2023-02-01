<h1>Harjoitus 11</h1>
<h2>11.2 Hahmon luonti</h2>
<?php
require "./demot/yhteys.php";

if (isset ($_POST["name"], $_POST["raceID"], $_POST["Strength"], $_POST["Dexterity"], $_POST["intelligence"], $_POST["wisdom"]
 , $_POST["hitpoints"])) {
	$data = array($_POST["name"], $_POST["raceID"], $_POST["classID"], $_POST["Strength"], $_POST["Dexterity"], $_POST["intelligence"], $_POST["wisdom"]
, $_POST["hitpoints"]);
	print_r($data);
	$sql = "INSERT INTO `h11_characcter` ( name , raceID, classID, Strength, Dexterity, intelligence, wisdom, hitpoints  ) values (?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
 $stmt->execute($data);
}

?>
<form method ="post">
<select name="classID">
<?php
// harjoitus 11.2 - hahmon luonti
require "./demot/yhteys.php";
$sql = "SELECT*FROM h11_class";
  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
 
foreach ($rows as $row) {
	$classid = $row["classID"];
	
	$name = $row ["name"];
	echo "<option value='$classid'>$name</option>";
}
?>

</select>


<select name="raceID">
<?php
// harjoitus 11.2 - hahmon luonti
require "./demot/yhteys.php";
$sql = "SELECT*FROM h11_race";
  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
 
foreach ($rows as $row) {
	$raceID = $row["raceID"];
	$name = $row ["name"];
	echo "<option value='$raceID'>$name</option>";
}
?>
</select>



<br />
<input type="text"  name = "name" placeholder="input name">
<br />
<input type="number" name = "Strength" min="1" max="18" placeholder="Strength">
<br />
<input type="number" name = "Dexterity" min="1" max="18" placeholder="Dexterity">
<br />
<input type="number" name = "intelligence" min="1" max="18" placeholder="intelligence">
<br />
<input type="number" name = "wisdom" min="1" max="18" placeholder="wisdom">
<br />
<input type="number" name = "charisma" min="1" max="18" placeholder="charisma">
<br />
<input type="number" name = "hitpoints" min="1" max="18" placeholder="hitpoints">
<br />
<input type="number" name = "Level" min="0" max="100" placeholder="Level">
<br />
<input type="submit" value="Save new character">
<br />

</form>

<h2>11.3 Taulun hahmot</h2>


<?php

$sql= "SELECT h11_race.name AS RaceName, h11_class.name AS ClassName, h11_characcter.name As PlayerName, h11_characcter.* FROM `h11_characcter` inner join h11_race on h11_race.raceid=h11_characcter.raceID inner join h11_class on h11_class.classID=h11_characcter.classID";

if (isset($_POST["syote"])) {
$syote = $_POST["syote"];
$sql .= " WHERE h11_characcter.name LIKE '$syote%'";
echo $sql; 
}

  $stmt = $pdo->query($sql);
   $rows = $stmt->fetchAll();
   
   echo "<table border=1>";
  
  echo "<tr><th>CHARACTER</th><th>NAME</th><th>STRENGTH</th><th>DEXTERITY</th><th>WISDOM</th><th>INTELLIGENCE</th><th>HITPOINTS</th><th> LEVEL </th>";
foreach ($rows as $row) {
  echo "<tr>";
  echo "<td>" . $row["characterID"] . "</td>";
  echo "<td>" . $row["name"] . "</td>";
   echo "<td>" . $row["strength"] . "</td>";
    echo "<td>" . $row["dexterity"] . "</td>";
	echo "<td>" . $row["wisdom"] . "</td>"; 
	echo "<td>" . $row["intelligence"] . "</td>"; 
	echo "<td>" . $row["hitpoints"] . "</td>"; 
	echo "<td>" . $row["classID"] . "</td>"; 
	echo "<td>" . $row["raceID"] . "</td>"; 
echo "</tr>";
}   
 echo "</table>";

?>
<h2>11.4 Hahmojen hakeminen</h2>
<form method ="post">
<input type="text"  name = "syote" placeholder="input name">

<input type="submit" value="Hae">
<br />

</form>

<h2>11.5 Tietojen tallentaminen JSON-tiedostoon</h2>

<?Php


?>