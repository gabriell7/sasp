<?php


$numero3= 68995;
echo(floor(1.5) . "<br>");
echo(ceil(1.456) . "<br>");
echo(round(68995, -1 ) . "<br>");
echo(ceil(124.558 ) . "<br>");
echo(ceil(3.14) . "<br>");

 
 
$luku = rand(1,20);
if ($luku % 2 == 0) 
    echo "<h4> $luku  parillinen  </h4>"; 
else {
    echo "<h4> $luku  pariton   </h4>";
    }





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
