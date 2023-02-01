<?php

include "./views/partials/head.php";
?>

<h1>Etusivu</h1>
<img src="lataus.jfif" alt="" width="" height="">

<?php
if(isset($message)) echo $message;
?>


<?php

/*foreach ($merkinnat as $merkinta) { ?>
<h4><?=$merkinta["päiväys"];?></h4>
<h4><?=$merkinta["intentsiteeti"];?></h4>
<h4><?=$merkinta["merkintaID"];?></h4>
<h4><?=$merkinta["lajiID"];?></h4>
<a href="./index.php?action=editplayer&playerID=<?= $merkinta["merkintaID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deleteplayer&playerID=<?= $merkinta["merkintaID"];?>">Poista</a><br>

                             
<?php
}
*/
include "./views/partials/end.php";
?>