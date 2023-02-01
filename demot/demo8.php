<h2>8.1</h2> 
<?php 
/* Laadi for-silmukkaa käyttäen 10 alkion taulukko $numerot, jossa kaikkien alkioiden arvo on aluksi 0. 
*/ 

for($i = 0; $i < 10; $i++)  { 
    $numerot[$i] = 0; 
} 

/* Tee seuraavien indeksin ja arvojen muutokset: 

indeksiin 0 arvo 5 
indeksiin 2 arvo 3 
indeksiin 3 arvo 9 
indeksiin 1 arvo 2 
indeksiin 9 arvo 4 */ 


$numerot[0] = 5; 
$numerot[2] = 3; 
$numerot[3] = 9; 
$numerot[1] = 2; 
$numerot[9] = 4; 

/* Tulosta taulukko print_r-funktiolla */ 

print_r($numerot); 

/*Tulosta taulukko var_dump-funktiolla*/ 
var_dump($numerot); 

/* Tulosta taulukon arvot for-silmukkaa käyttäen.*/ 

for($i = 0; $i < sizeof($numerot); $i++) { 
    echo $numerot[$i]."<br>"; 
} 

/* Tulosta taulukon arvot foreach-silmukkaa käyttäen. 
Laske samalla taulukon arvojen summa.*/ 

$summa = 0; 
foreach($numerot as $arvo) { 
    echo $arvo."<br>"; 
    $summa = $summa + $arvo;  
} 

echo "Arvo yhteensä $summa<br>"; 
?> 

<h2>8.2</h2> 

<?php 
/*Laadi 5 alkion taulukko $koulu.*/ 
$koulu = array(); 
/* Tee seuraavien indeksin ja arvojen muutokset: 
avaimeen "nimi" arvo "Tredu" 
avaimeen "osoite" arvo "Hepolamminkatu 10" 
avaimeen "postinro" arvo "33720" 
avaimeen "postitp" arvo "TAMPERE" 
avaimeen "maa" arvo "Suomi"*/ 

$koulu["nimi"] = "Tredu"; 
$koulu["osoite"] = "Hepolamminkatu 10"; 
$koulu["postinro"] = "33720"; 
$koulu["postitp"] = "TAMPERE"; 
$koulu["maa"] = "Suomi"; 

/*Tulosta taulukon arvot foreach-silmukkaa käyttäen.*/ 
foreach($koulu as $avain=>$arvo) { 
    echo "$avain on $arvo<br>"; 
} 

/*Tulosta taulukko print_r-funktiolla*/ 
echo "<br>"; 
print_r($koulu); 
echo "<br>"; 
/*Tulosta taulukko var_dump-funktiolla */ 