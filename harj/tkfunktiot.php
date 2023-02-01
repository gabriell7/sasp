

<?php
function tunnusta_ei_kannassa($yhteys,$ktunnus) 
{
    $kysely = $yhteys->prepare("SELECT * FROM kayttaja WHERE ktunnus=?");
    $kysely->execute(array($ktunnus)); $rivimaara = $kysely->rowCount(); //laskee vastauksesta rivien määrän

    if($rivimaara == 0) return true;
    else return false;

}


/* Funktio palauttaa käyttäjän id:n*/
function hae_id_kannasta($ktunnus,$salasana) 
{
    require "./tietokanta/yhteys.php";
    $id=NULL;
    $lause = $yhteys->prepare("SELECT * FROM kayttaja WHERE ktunnus=:ktunnus AND salasana =:salasana");
    $lause->bindParam(':ktunnus', $tunnari);
    $lause->bindParam(':salasana', $passu);

    $tunnari = $ktunnus;
    $passu = $salasana;
    $lause->execute();

    $rivi = $lause->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($rivi)) $id = $rivi[0]["kid"];
    return $id;
}
?> 
<?php
/* Funktio palauttaa käyttäjän id:n*/
function hae_id_kannasta($ktunnus,$salasana) 
{
    require "./tietokanta/yhteys.php";
    $id=NULL;
    $lause = $yhteys->prepare("SELECT * FROM kayttaja WHERE ktunnus=:ktunnus AND salasana =:salasana");
    $lause->bindParam(':ktunnus', $tunnari);
    $lause->bindParam(':salasana', $passu);

    $tunnari = $ktunnus;
    $passu = $salasana;

    $lause->execute();

    $rivi = $lause->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($rivi)) $id = $rivi[0]["kid"];
    return $id;
}
?>