<?php

include "./views/partials/head.php";
?>

<h1>Etusivu</h1>
<img src="lataus.jfif" alt="" width="" height="">

<?php
if(isset($message)) echo $message;
?>


<?php

foreach ($arvostelut as $arvostelut) { ?>
<h4><?=$arvostelut["päiväys"];?></h4>
<h4><?=$arvostelut["intentsiteeti"];?></h4>
<h4><?=$arvostelut["merkintaID"];?></h4>
<h4><?=$arvostelut["lajiID"];?></h4>
<a href="./index.php?action=editplayer&playerID=<?= $arvostelut["merkintaID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deleteplayer&playerID=<?= $arvostelut["merkintaID"];?>">Poista</a><br>

                             
<?php
}
include "./views/partials/end.php";
?>