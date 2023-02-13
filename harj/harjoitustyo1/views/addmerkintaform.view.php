<?php
include "./views/partials/adminhead.php";
?>
<link rel="stylesheet" href="./views/partials/tyyli2.css">
<h1>lisää Merkinta</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="email">nimi</label><br>
<input id="kayttajatunnus" type="text" name="nimi" required><br>


<label for ="password">kuvaus</label><br>
<input id="kayttajatunnus" type="text" name="kuvaus" required><br>


<label for="Suorituksen päiväys">pisteet</label><br>
<input  id="kayttajatunnus" type= "number" id="" name="pisteet">
 



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
<br><input type="submit" value="lisää arvosana">
</form>


<?php

include "./views/partials/end.php";
?>