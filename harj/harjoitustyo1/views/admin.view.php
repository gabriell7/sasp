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

foreach($arvostelut as $arvostelu) { ?>
    <h4><?=$arvostelu["kirjoitettu"];?></h4>
    <h4><?=$arvostelu["otsikko"];?></h4>
    <h4><?=$arvostelu["kokonaisarvio"];?></h4>
    <h4><?=$arvostelu["nimi"];?></h4>
    <a href="./index.php?action=editarvostelu&arvosteluID=<?= $arvostelu["arvosteluID"];?>">Muokkaa</a><br>
<a href="./index.php?action=deletearvostelu&arvostelu=<?= $arvostelu["arvosteluID"];?>">Poista</a><br>

</body>
<?php
}
include "./views/partials/end.php";
