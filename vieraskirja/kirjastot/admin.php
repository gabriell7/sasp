<?php
$sivu="admin_etusivu";
if(isset($_GET["sivu"])) $sivu=$_GET["sivu"];

require "./kirjastot/funktiot.php";//ulkoasufunktiot käyttöön
require "./tietokanta/yhteys.php";//tietokantayhteys käyttöön
require "./tietokanta/tkfunktiot.php";//tietokantafuntiot käyttöön

tulosta_admin_alku();

tulosta_admin_sisalto($sivu);

tulosta_admin_loppu();
?>