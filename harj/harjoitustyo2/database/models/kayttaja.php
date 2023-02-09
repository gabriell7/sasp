<?php
/*  
CREATE TABLE IF NOT EXISTS `players` (
  `playerID` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `current_character` varchar(15) NOT NULL,
  `money` decimal(10,0) NOT NULL DEFAULT '500',
  `lastLogin` date NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `teamID` int(10) DEFAULT NULL,
  PRIMARY KEY (`playerID`),
  KEY `teamID` (`teamID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
*/

require "./database/connection.php";

function getAllmerkinnat()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht2_merkinta";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $players = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $players;

}

function getAllPlayers()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht2_kayttaja";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $players = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $players;

}

function getAllLajit()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht2_laji";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $laji = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $laji;

}

function getAllmerkintäbykayttaja()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht2_merkinta inner join ht2_laji on ht2_merkinta.lajiID=ht2_laji.lajiID where ht2_merkinta.kayttajaID = ?"; 
    //Kohta 2 rakenna SQL

    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $_SESSION["id"]);
    $stm->execute(); //Kohta 3 suorita sql

    $merkinnät = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $merkinnät;

}
function getmerkintäById($id)
{
    global $pdo;

    $sql = "SELECT * FROM ht2_merkinta WHERE merkintaID = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();

    $merkinta = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $merkinta;
}


function getPlayerByNickname($nickname)
{
    global $pdo;

    $sql = "SELECT * FROM ht2_kayttaja WHERE email = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $nickname);
    $stm->execute();
    
    $player = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $player;
}


function addPlayer($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO ht2_kayttaja (nimi,salasana,email) VALUES (?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function addmerkinta($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO ht2_merkinta (kayttajaID,lajiID,päiväys,intentsiteeti,kommentti) VALUES (?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}
function editPlayer($data)
{
    global $pdo;

    $sql ="UPDATE players SET nickname = ?, email = ?, current_character = ?, banned = ? WHERE playerID = ?";

    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function deleteMerkinta($id)
{
    global $pdo;

    $sql = "DELETE FROM ht2_merkinta WHERE merkintaID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok; 
}

//funktio tarkistaa, löytyykö käyttäjä tietokannasta
function loginPlayer($email,$password)
{
    global $pdo; //yhteys

    $sql = "SELECT email,salasana FROM ht2_kayttaja WHERE email = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1,$email);
    $stm->execute();

    $player = $stm->fetchAll(PDO::FETCH_ASSOC);

    //tarkistetaan, vastaavatko salasanat toisiaan
    if($player) {
        if(password_verify($password,$player[0]["salasana"]))  {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
}
