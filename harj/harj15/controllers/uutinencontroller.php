<?php
require "./database/models/uutinen.php";
require "./database/models/kayttaja.php";
require "./helpers/helper.php";

function indexcontroller()
{
    $uutiset = haeKaikkiuutiset();
    //var_dump($players);
    require "./views/index.view.php";
}

function admincontroller()
{
    $uutiset = haeKaikkiuutiset();
    //var_dump($players);
    require "./views/admin.view.php";
}

function postregistercontroller()
{
    if(isset($_POST["kayttajatunnus"],$_POST["password"],$_POST["password2"])  &&  $_POST["password"] === $_POST["password2"])   {
        echo "Formi perillä";
        $nickname = sanit($_POST["kayttajatunnus"]);
        $password = sanitpassword($_POST["password"]);
        

        $data = array($nickname,$password);

        var_dump($data);

        $ok = lisaaKayttaja($data);

        if($ok) {
            $message = "Rekisteröinti onnistui";
            $uutiset = haeKaikkiUutiset(); //hakee kaikki pelaajat kannasta
            require "./views/index.view.php";
        }
        else {
            $message = "Rekisteröinti ei onnistu...";
            require "./views/registerform.view.php";
        }
    } else {
        $message = "Tiedoissa vikaa...";
        require "./views/registerform.view.php";
    }
}

function postlogincontroller()
{
   if(isset($_POST["nickname"],$_POST["password"]))  {
       $nickname = sanit($_POST["nickname"]);
       $password = sanit($_POST["password"]);

       $ok = tarkistalogin($nickname,$password); //tietokantamallissa

       if($ok) {
           $kayttaja =getPlayerByNickname($nickname);
           $id = $kayttaja[0]["kayttajaID"];
           $ip = $_SERVER["REMOTE_ADDR"];

           //asetetaan istuntomuuttujan arvot

           $_SESSION["id"] = $id;
           $_SESSION["ip"] = $ip;

           $uutiset = haeKaikkiuutiset();
           require "./views/admin.view.php";
       } else {
           $message = "Käyttäjää ei löydy";
           require "./views/loginform.view.php";
       }
   } else {
       $message = "Täytä kaikki tiedot!";
       require "./views/loginform.view.php";
   }
}

function logoutcontroller()
{
    if(isset($_SESSION["ip"],$_SESSION["id"]))  {
        session_unset(); //poistaa istuntomuuttujat
        session_destroy();//poistaa koko istunnon
        header("Location:./index.php");
    } else header("Location:./index.php");

}

function deleteuutinencontroller()
{
    if(isset($_GET["uutinenID"])) {
        $uutinenID = $_GET["uutinenID"];
        if(poistauutinen($uutinenID)) $message="Pelaaja on poistettu";
        else $message="Pelaaja ei poistunut";
        $uutiset = haekaikkiuutiset();
        require "./views/admin.view.php";
    } else header("Location:./index.php?action=admin");
    /* myös 
    } else { $players = getAllPlayers();
        $message = "ei poistettavaa id:tä";
        require "./views/admin.view.php";
    }*/
}

// hakee id:n mukaan pelaajan tiedot kannasta ja antaa ne muokkauslomakkeelle
function getedituutinencontroller()
{
    if(isset($_GET["uutinenID"])) {
        $uutinenID=$_GET["uutinenID"];
        $uutinen = haeuutinen($uutinenID);
        var_dump($uutinen);
        require "./views/edituutinenform.view.php";
    } else {
        $message="Ei valittuna pelaajaa";
        $uutiset = haekaikkiuutiset();
        require "./views/admin.view.php";
    }
}

function postedituutinencontroller()
{
    if (isset($_POST["kirjoittaja"],$_POST["sisalto"],$_POST["uutinenID"],$_POST["otsikko"])) { 
        $uutinenID = $_POST["uutinenID"];
        $otsikko = sanit($_POST["otsikko"]);
        $kirjoittaja = sanit($_POST["kirjoittaja"]);
        $teksti = sanit($_POST["sisalto"]);
       

        $data = array($otsikko,$kirjoittaja,$teksti,$uutinenID);

        if(edituutinen($data)) {
            $message = "Muokkaus on tehty";

        } else {
            $message = "Muokkaus ei onnistunut";  
        }
    } else { 
        $message = "Lomakkeelta puuttuu tietoja";         
    }
    $uutiset = haekaikkiuutiset();
    require "./views/admin.view.php";
}

?>