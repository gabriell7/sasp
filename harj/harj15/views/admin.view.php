<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>


<?php
foreach($uutiset as $uutinen) { ?> 
<h4><?=$uutinen["otsikko"];?></h4>
<a href="./index.php?action=edituutinen&uutinenID=<?= $uutinen["uutinenID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deleteuutinen&uutinenID=<?= $uutinen["uutinenID"];?>">Poista</a><br>

<?php
}
include "./views/partials/end.php";
?>