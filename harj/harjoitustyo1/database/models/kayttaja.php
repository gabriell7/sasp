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

function getAllelokuvat()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht1_elokuvat";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $arvostelijat = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $arvostelijat;

}

function getAllarvostelijat()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht2_arvostelija";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $arvostelijat = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $arvostelijat;

}

function getAllarvostelu()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht2_arvosteltava";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $arvostelu = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $arvostelu;

}




function getAllarvostelubyarvostelija()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM ht1_arvostelu inner join ht1_elokuvat on ht1_elokuvat.elokuvaID=ht1_arvostelu.elokuvaID where ht1_arvostelu.arvostelijaID = ?"; 
    //Kohta 2 rakenna SQL

    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $_SESSION["id"]);
    $stm->execute(); //Kohta 3 suorita sql

    $arvostelu = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $arvostelu;

}


function getarvostelijaById($id)
{
    global $pdo;

    $sql = "SELECT * FROM ht1_arvostelija WHERE arvostelijaID = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();

    $arvostelu = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $arvostelu;
}


function getarvostelijaByNickname($nimi)
{
    global $pdo;

    $sql = "SELECT * FROM ht1_arvostelija WHERE email = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $nickname);
    $stm->execute();
    
    $player = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $player;
}


function addArvostejia($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO ht1_arvostelija (nimi,salasana,email,liittynyt) VALUES (?,?,?, CURDATE())";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function addarvostelu($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO ht1_arvostelu (arvostelu,otsikko,kokonaisarvio,elokuvaID,arvostelijaID,kirjoitettu) VALUES (?,?,?,?,?,?)";
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

function deletearvostelu($id)
{
    global $pdo;

    $sql = "DELETE FROM ht1_arvostelu WHERE arvosteluID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;
}

//funktio tarkistaa, löytyykö käyttäjä tietokannasta
function loginPlayer($email,$password)
{
    global $pdo; //yhteys

    $sql = "SELECT email,salasana FROM ht1_arvostelija WHERE email = ?";

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
