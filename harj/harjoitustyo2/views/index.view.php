<?php

include "./views/partials/head.php";
?>

<h1>Urheilupäiväkirja</h1>
<img src="lataus.jfif" alt="" width="" height="">

<?php
if(isset($message)) echo $message;
?>


<?php

foreach ($merkinnat as $merkinta) { ?>
<h4><?=$merkinta["päiväys"];?></h4>
<h4><?=$merkinta["intentsiteeti"];?></h4>
<h4><?=$merkinta["merkintaID"];?></h4>
<h4><?=$merkinta["lajiID"];?></h4>

                             
<?php
}

include "./views/partials/end.php";
?>