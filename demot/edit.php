<?php
require "yhteys.php";
if (isset($_POST["name"], $_POST["company"], 
  $_POST["release"], $_POST["gameid"])) {
	// tuli post 
	$name = $_POST["name"];
	$company = $_POST["company"];
	$release = $_POST["release"];
	$gameid = $_POST["gameid"];
	$data = array($name, $company, $release, $gameid);
	$sql = "UPDATE `computergames` SET `name`=?, 
		`company`=?, `release`=? WHERE gameid=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
header('Location: ../index.php?sivu=demo9&kansio=demot');
	exit;
}


if (isset($_GET["id"])){
	// tuli get
	$sql = "SELECT * FROM computergames WHERE gameid=?";
	$data = array($_GET["id"]);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	
	$rows = $stmt->fetchAll();
	//var_dump($rows);
	if (!$rows) {
		echo "No games!";
	}
	else {
		$name = $rows[0]["name"];
		$company = $rows[0]["company"];
		$release = $rows[0]["release"];
		$gameid = $_GET["id"];
	}
}

?>

<h2>Edit game</h2>
<form method="post">
<input type="text" value="<?php echo $name; ?>" name="name" /><br />
<input type="text" value="<?php echo $company; ?>" name="company" /><br />
<input type="number" value="<?php echo $release; ?>" name="release" /><br />
<input type="hidden" name="gameid" value="<?php echo $gameid; ?>" />
<input type="submit" value="Save" /><br />
</form>