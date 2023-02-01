<?php

echo "<h1>harj 3</h1>";
echo "<h2>teht 1</h2>";

$luku1 = rand(1,1000);

echo "Voittajan arpa nro $luku1". "<br>";

echo "<h2>teht 2</h2>";

$numero3= 68995;
echo(ceil(1.5) . "<br>");
echo(floor(1.456) . "<br>");
echo(round(68995, -1 ) . "<br>");
echo(ceil(124.558 ) . "<br>");
echo(floor(3.14) . "<br>");

echo "<h2>teht 3</h2>"; 
 
$luku = rand(1,20);
if ($luku % 2 == 0) 
    echo "<h4> $luku  parillinen  </h4>"; 
else {
    echo "<h4> $luku  pariton   </h4>";
    }

    echo "<h2>teht 4</h2>";



$luku2 = rand(1,100);
if ($luku2<30 || $luku >50)
    echo "<h4> $luku2 pienihekö  </h4>"; 
else if ($luku2<10 || $luku > 90)
    echo "<h4> $luku2 ääriarvo  </h4>"; 

else if ($luku2 % 2 == 0 && $luku<50 ) 
    echo "<h4> $luku2 Pieni ja parillinen  </h4>";

else if ($luku2 != 35) 
    echo "<h4> $luku2 ei ole 35 </h4>";

else {
    echo "<h4> $luku2 tämä luku on pariton   </h4>";
}

echo "<h2>teht 5</h2>"; 




$merkkijono1 = "";
$merkkijono2 = "";
$merkkijono3 = "";
 
if(sqrt(146) > pow(3,3)) {
    echo "Neliöjuuri on suurempi<br>";
} else {
    echo "3 Potenssiin 3 on suurempi<br>";
} 
 
if(165 % 8 > hexdec("0x03")) {
   echo "165 / 8 jakojäännös on suurempi<br>";
} else {
 echo "hexadesimaaliluku 03 desimaalilukuna on suurempi<br>";
}
 
$suurempi = array(hexdec("0xAF"), pow(5,3), 155);
if(hexdec("0xAF") == max($suurempi)) {
    echo "heksadesimaaliluku AF on suurin<br>";
} elseif(pow(5,3) == max($suurempi)) {
    echo "5 potenssiin 3 on suurin<br>";
} else {
    echo "155 on suurin<br>";
}

?>
