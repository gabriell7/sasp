<?php

function putsaa($sana)
{
    $sana=trim($sana);//poistaa tyhjät merkit merkkijonon alusta ja lopusta
    $sana=htmlspecialchars($sana); //muuntaa html-tagit entiteeteiksi
    return $sana;
}



function muunna_salasana($sana) //apufunktio salasanan vahvistusta varten
{
    $sana.="puppu";
    $sana=md5($sana);
    return $sana;
}

?>