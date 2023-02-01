<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

    <input type ="hidden" name="kayttajaID" value="<?= $kayttaja[0]["playerID"];?>">

    <label for="nickname">Nickname</label><br>
    <input type ="text" name ="kayttaja" value ="<?= $kayttaja[0]["kayttaja"];?>" required><br>

   
    <label for="email">Email</label><br>
    <input type="email" name="email" value ="<?= $kayttaja[0]["email"]; ?>" required><br>

    
    <br>
    <label for="banned">Bannattu</label>
    <input type ="checkbox" name="banned" <?php if($player[0]["banned"] == 0) echo "value=\"0\"";
    else echo "value=\"1\" checked";?>><br>


    <input type="submit" value="Muuta pelaajaa">
    </form>



<?php 
include "./views/partials/end.php";
?>