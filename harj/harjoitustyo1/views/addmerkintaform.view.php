<?php
include "./views/partials/adminhead.php";
?>
<link rel="stylesheet" href="./views/partials/tyyli2.css">
<h1>lisää Merkinta</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="email">Kommentti</label><br>
<input id="kayttajatunnus" type="text" name="Kommentti" required><br>


<label for ="password">Intentsiteeti</label><br>
<input id="kayttajatunnus" type="text" name="Intentsiteeti" required><br>


<label for="Suorituksen päiväys">Suorituksen päiväys:</label><br>
<input  id="kayttajatunnus" type="date" id="" name="päiväys">
 



<label for="lajitID">Suorituksen lajit</label><br>
<select name="lajiID" >

<?php

foreach ($arvostelijat as $arvostelijat) {
    $nimi = $arvostelijat ["nimi"];
    $id = $arvostelijat["lajiID"];
    echo"<option value='$id'>$nimi</option>";
}

?>
</select>
<br><input type="submit" value="lisää merkintä">
</form>


<?php

include "./views/partials/end.php";
?>