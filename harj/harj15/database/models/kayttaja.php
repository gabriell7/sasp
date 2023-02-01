<?php

require "./database/connection.php";


function haeKaikkiKayttajat()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM kayttajat";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $kayttajat = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $kayttajat;

}

function lisaaKayttaja($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO kayttajat (kayttajatunnus,salasana) VALUES (?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}
function poistakayttaja($id)
{
    global $pdo;

    $sql = "DELETE FROM kayttajat WHERE kayttajaID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;
}
function tarkistalogin($nickname,$password)
{
    global $pdo; //yhteys

    $sql = "SELECT kayttajatunnus, salasana FROM kayttajat WHERE kayttajatunnus = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1,$nickname);
    $stm->execute();

    $kaytaja = $stm->fetchAll(PDO::FETCH_ASSOC);

    //tarkistetaan, vastaavatko salasanat toisiaan
    if($kaytaja) {
        if(password_verify($password,$kaytaja[0]["salasana"]))  {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
}
function getPlayerByNickname($nickname)
{
    global $pdo;

    $sql = "SELECT * FROM kayttajat WHERE kayttajatunnus = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $nickname);
    $stm->execute();
    
    $kaytaja = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $kaytaja;
}
