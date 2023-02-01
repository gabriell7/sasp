<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

    <input type ="hidden" name="uutinenID" value="<?= $uutinen[0]["uutinenID"];?>">

    <label for="nickname">Otsikko</label><br>
    <input type="text" id="fname" name="otsikko"  value ="<?= $uutinen[0]["otsikko"];?>"><br><br>
   
    <label for="kirjoittaja">kirjoittaja</label><br>
    <input type="text" id="fname" name="kirjoittaja" value ="<?= $uutinen[0]["kirjoittaja"];?>"><br><br>


    <label for="character">Teksti</label><br>
    <textarea id="" name="sisalto" rows="6" cols="50" > 
    <?= $uutinen[0]["sisalto"];?>
    </textarea>

<input type="submit" value="Muuta uutista">
</form>


<?php 
include "./views/partials/end.php";
?>