<?php
include "./views/partials/adminhead.php";
?>
<link rel="stylesheet" href="./views/partials/tyyli2.css">
<h1>lisää Arvostelu</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="arvostelu">arvostelu</label><br>

<textarea  id="kayttajatunnus" type="text " name="arvostelu" required></textarea><br>


<label for ="otsikko">otsikko</label><br>
<input id="kayttajatunnus" type="input text" name="otsikko" required><br>


<label for="kokonaisarvio">kokonaisarvio</label><br>
<input  id="kayttajatunnus" type= "text" id="" name="kokonaisarvio"><br>



 

<select name ="elokuvaID">

<?php

foreach ($elokuvat as $elokuva) {
    $nimi = $elokuva ["nimi"];
    $id = $elokuva["elokuvaID"];
    echo"<option value='$id'>$nimi</option>";
}

?>
</select>
<br><input type="submit" value="lisää arvosana">
</form>


<?php

include "./views/partials/end.php";
?>