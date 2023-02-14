<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>

form method ="post">

<label for="kommentti">Kommentti</label><br>
<input  type="text" name= "kommentti" value="<?php echo $arvostelu[0]["kommentti"]; ?>" ><br>


<label for ="password">Intentsiteeti</label><br>
<input id="kayttajatunnus" type="text" value="<?php echo $arvostelu[0]["intentsiteeti"]; ?>"name="intentsiteeti" required><br>


<label for="Suorituksen päiväys">Suorituksen päiväys:</label><br>
<input  id="kayttajatunnus" type="date" value="<?php echo $arvostelu[0]["päiväys"]; ?>" name="päiväys">
 



<label for="lajiID">Suorituksen lajit</label><br>
<select id="kayttajatunnus" id="" value="<?php echo  $laji[0]["laji"]; ?>" name="päiväys">

<?php

foreach ($lajit as $lajit) {
    $nimi = $lajit ["nimi"];
    $id = $lajit["lajiID"];
    echo"<option value='$id'>$nimi</option>";
}

?>
</select>
<br><input type="submit" value="lisää merkintä">
</form>


<?php 
include "./views/partials/end.php";
?>