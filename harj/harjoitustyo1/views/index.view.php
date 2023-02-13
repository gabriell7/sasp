<?php

include "./views/partials/head.php";
?>

<h1>Etusivu</h1>
<img src="lataus.jfif" alt="" width="" height="">

<?php
if(isset($message)) echo $message;
?>


<?php

foreach ($elokuvat as $elokuvat) { ?>
<h4><?=$elokuvat["nimi"];?></h4>
<h4><?=$elokuvat["kuvaus"];?></h4>
<h4><?=$elokuvat["pisteet"];?></h4>
<a href="./index.php?action=editelokuvat&elokuvatID=<?= $elokuvat["elokuvaID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deleteelokuvat&elokuvatID=<?= $elokuvat["elokuvaID"];?>">Poista</a><br>

                             
<?php
}
include "./views/partials/end.php";
?>