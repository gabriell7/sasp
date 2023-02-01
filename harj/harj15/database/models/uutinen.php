<?php

require "./database/connection.php";


function haeKaikkiuutiset()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM uutinen";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $uutiset = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $uutiset;

}

function lisaauutinen($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO uutinen (nickname,password,email,current_character,lastLogin) VALUES (?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}
function poistauutinen($id)
{
    global $pdo;

    $sql = "DELETE FROM uutinen WHERE uutinenID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;
}


function haeuutinen($id)
{
    global $pdo;

    $sql = "SELECT * FROM uutinen WHERE uutinenID = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();
    
    $uutinen = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $uutinen;
}
function edituutinen($data)
{
    global $pdo;

    $sql ="UPDATE uutinen SET  otsikko = ?, kirjoittaja = ?,  sisalto = ? WHERE uutinenID = ?";

    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}
?>