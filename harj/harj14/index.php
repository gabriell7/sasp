<?php
// index.php
// harj14.3
// täällä luodaan hahmo ja kutsutaan
// muita tiedostoja

require "character.php";

$first = new Character("Uusi tyyppi");

require "character.view.php";
?>