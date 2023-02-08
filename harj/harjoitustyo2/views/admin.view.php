<?php
include "./views/partials/adminhead.php";
?>
<link rel="stylesheet" href="./views/partials/tyyli2.css">
<body>
<h1>Hallintapaneeli</h1>
<link rel="stylesheet" href="./views/tyyli2.css">
<?php
if(isset($message)) echo $message;
?>


<?php
 /*
foreach ($merkinnat as $merkinta) { ?>
<h4><?=$merkinta["päiväys"];?></h4>
<h4><?=$merkinta["intentsiteeti"];?></h4>
<h4><?=$merkinta["merkintaID"];?></h4>
<h4><?=$merkinta["lajiID"];?></h4>
<a href="./index.php?action=editmerkinta&merkintaID=<?= $merkinta["merkintaID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deletemerkinta&merkintaID=<?= $merkinta["merkintaID"];?>">Poista</a><br>
}
*/
?>                           
<?php


include "./views/partials/end.php";
foreach ($merkinnat as $merkinta) { ?>
<h4><?=$merkinta["päiväys"];?></h4>
<h4><?=$merkinta["intentsiteeti"];?></h4>
<h4><?=$merkinta["merkintaID"];?></h4>
<h4><?=$merkinta["lajiID"];?></h4>
<a href="./index.php?action=editmerkinta&merkintaID=<?= $merkinta["merkintaID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deletemerkinta&merkintaID=<?= $merkinta["merkintaID"];?>">Poista</a><br>

                             
<?php
}
