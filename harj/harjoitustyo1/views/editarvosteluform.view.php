<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="otsikko">Otsikko</label><br>
<input  type="text" name="otsikko" value="<?php echo $arvostelu[0]["otsikko"]; ?>" ><br>


<label for="kokonaisarvio">kokonaisarvio</label><br>
<input  id="" type="text" value="<?php echo $arvostelu[0]["kokonaisarvio"]; ?>" name="kokonaisarvio"><br>
 

<label for="arvostelija">arvostelija</label><br>
  <textarea type="number" id=""  name="arvostelu">
  <?php echo $arvostelu[0]["arvostelu"]; ?>
  </textarea><br>
 

<label for="elokuvaID">elokuvat</label><br>
<select id="kayttajatunnus" id="" value="<?php echo  $arvostelu[0]["elokuvaID"]; ?>" name="elokuvaID">

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

<input type="hidden" name="arvosteluID"  value="<?php echo  $arvostelu[0]["arvosteluID"]; ?>" >
</form>


<?php 
include "./views/partials/end.php";
?>