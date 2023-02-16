<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="kommentti">Otsikko</label><br>
<input  type="text" name= "Otsikko" value="<?php echo $arvostelu[0]["otsikko"]; ?>" ><br>


<label for="elokuva">kokonaisarvio</label><br>
<input  id="" type="text" value="<?php echo $arvostelu[0]["kokonaisarvio"]; ?>" name="kokonaisarvio"><br>
 

<label for="arvostelija">arvostelija</label><br>
  <textarea type="number" id="" value="<?php echo $arvostelu[0]["arvostelijaID"]; ?>" name="arvostelija"></textarea><br>
 

<label for="lajiID">elokuvat</label><br>
<select id="kayttajatunnus" id="" value="<?php echo  $arvostelu[0]["elokuvaID"]; ?>" name="päiväys">

<?php

foreach ($elokuvat as $elokuvat) {
    $nimi = $elokuvat ["nimi"];
    $kuvaus = $elokuvat ["kuvaus"];
    $pisteet = $elokuvat ["pisteet"];
    $id = $elokuvat["elokuvaID"];
    echo"<option value='$id'>$nimi</option>";
}

?>
</select>
<br><input type="submit" value="lisää merkintä">
</form>


<?php 
include "./views/partials/end.php";
?>