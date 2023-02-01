<?php
//lomakeenkäsittely
session_start();// ota istunto käytöön
$ok= false; // oletuksena ei kirjauduttu
// -- TÄHÄN LOMAKEENKÄSITTELIJÄ --
if (isset($_SESSION["ok"])) {
	$ok = true;
if (isset($_POST ["password"])) {
	if ($_POST ["password"] == "salasana") {
  // käyttäjä antoi oikean salasanan
echo" tunnus oikein!";
$ok = true;
$_SESSION["ok"] = true;
}
else {
   $ok = false;
echo "Tunnus väärin :(";
}
}
   if($ok == false)
}
if (isset($_POST["logoff"])) {
	session_unset();
	session_destroy();
}
	   
	   


<form method="post">
<label for="password"< Syötä salasana</label><br />
<input type="password" name="password" /><br />
<input type="submit" value="Kirjaudu" />
</form>


<?php
}
else {
	// 2. jos ollaan kirjouduttu niin
	
?>

<form method="post">
<input type="submit" name="logoff" value="Kirjaudu ulos" />
</form>


<?php
}
?>