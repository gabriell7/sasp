<?php 
// määritellään oikea aikavyöhyke 
date_default_timezone_set("Europe/Helsinki"); 

echo "Sekunteja vuodesta 1970  ".time(); 
echo "<br>"; 

echo date('d.m.Y'); 
echo "<br>"; 
echo date('l'); 
echo "<br>"; 
echo date('Y-m-d'); 
echo "<br>"; 
$aika = 18000; 

echo date('d.m.Y',$aika); 
$paiva = 6; 
$kk = 12; 
$vuosi = 2019; 

$tunnit = 18; 
$minuutit = 15; 
$sekunnit = 10; 
echo "<br>"; 
$aika = mktime($tunnit,$minuutit,$sekunnit,$kk,$paiva,$vuosi); 
echo "mktimellä muutettu 6.12.19<br>"; 
echo $aika; 

echo "<br>"; 
echo date('d.m.Y  H:i',$aika); 

echo "<br>"; 

function palautaPvm()  
{ 
    $aika = date('Y-m-d'); 
    return $aika; 
} 

echo palautaPvm()."<br>"; 

// funktio laskee ajankohdan täsät päivästä kaksi viikkoa eteenpäin ja palauttaa sen MySQL-tietokannan hyväksymässä muodossa 
function laskeLoppumisPvm() 
{ 
    $aika = date('Y-m-d'); //aika nyt 
    $aika_kahden_viikon_paasta = date('Y-m-d', strtotime("$aika + 14 days")); 
    return $aika_kahden_viikon_paasta; 
} 

echo laskeLoppumisPvm()."<br>"; 

//laskee keston kahden päivämäärän välillä 

function laske_kesto($alkuaika,$loppuaika) //ajat merkkijonoissa 
{ 
    //muunnetaan merkkijonoja .. 
    $alku = date_create($alkuaika); 
    $loppu = date_create($loppuaika); 
    $ero = date_diff($alku,$loppu); 
    return $ero; 
} 

$aika_aluksi = "2008-06-18"; 
$aika_lopuksi = "2015-12-30"; 

$erotus = laske_kesto($aika_aluksi,$aika_lopuksi); 
echo $erotus->format("%a days")."<br>"; 
echo $erotus->format("%y Year %m Month %d Day");