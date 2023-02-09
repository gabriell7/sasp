<?php
require "./database/models/kayttaja.php";
require "./helpers/helper.php";

function indexcontroller()
{
    $merkinnat = getAllmerkinnat();
    //var_dump($players);
    require "./views/index.view.php";
}


function admincontroller()
{
    $merkinnat = getAllmerkintäbykayttaja();
    //var_dump($players);
    require "./views/admin.view.php";
}

function postregistercontroller()
{
    if(isset($_POST["kayttajatunnus"],$_POST["password"],$_POST["email"]))   {
        echo "Formi perillä";
        $nickname = sanit($_POST["kayttajatunnus"]);
        $password = sanitpassword($_POST["password"]);
        $email = sanit($_POST["email"]);
       
        $data = array($nickname,$password,$email);

        var_dump($data);

        $ok = addPlayer($data); 

        if($ok) {
            $message = "Rekisteröinti onnistui";
            $merkinnat = getAllmerkinnat(); //hakee kaikki pelaajat kannasta
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
   if(isset($_POST["email"],$_POST["salasana"]))  {
       $nickname = sanit($_POST["email"]);
       $password = sanit($_POST["salasana"]);

       $ok = loginPlayer($nickname,$password); //tietokantamallissa

       if($ok) {
           $player =getPlayerByNickname($nickname);
           $id = $player[0]["kayttajaID"];
           $ip = $_SERVER["REMOTE_ADDR"];

           //asetetaan istuntomuuttujan arvot

           $_SESSION["id"] = $id;
           $_SESSION["ip"] = $ip;

           $merkinnat = getAllmerkintäbykayttaja();
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


function getaddmerkintärcontroller()
{
    $lajit = getAllLajit();
    require "./views/addmerkintaform.view.php";

}


function deletemerkintacontroller()
{
    if(isset($_GET["merkintaID"])) {
        $merkintaID = $_GET["merkintaID"];
        if(deleteMerkinta($merkintaID)) $message="Merkinta on poistettu";
        else $message="Merkinta ei poistunut";
        $merkinnat = getAllmerkinnat();
        require "./views/admin.view.php";
    } else header("Location:./index.php?action=admin");
    /* myös 
    } else { $players = getAllPlayers();
        $message = "ei poistettavaa id:tä";
        require "./views/admin.view.php";
    }*/
}

// hakee id:n mukaan pelaajan tiedot kannasta ja antaa ne muokkauslomakkeelle
function geteditmerkintärcontroller()
{
    if(isset($_GET["merkintaID"])) {
        $merkintaID=$_GET["merkintaID"];
        $merkinta = getmerkintäById($merkintaID);
        $lajit = getAllLajit();
       // var_dump($merkinta);
        require "./views/editmerkintaform.view.php";
    } else {
        $message="Ei valittuna merkintää";
        $merkinnat = getAllmerkinnat();
        require "./admin.view.php";
    }
}

function posteditmerkintäcontroller()
{
    if(isset($_POST["merkintaID"],$_POST["kayttajaID"],$_POST["lajiID"],$_POST["päiväys"],$_POST["intentsiteeti"],$_POST["kommentti"])) {
        $merkintaID = $_POST["merkintaID"];
        $kayttajaID = sanit($_POST["kayttajaID"]);
        $lajiID = sanit($_POST["lajiID"]);
        $päiväys = sanit($_POST["päiväys"]);
        $intentsiteeti = sanit($_POST["intentsiteeti"]);
        $kommentti = sanit($_POST["kommentti"]);
        if(isset($_POST["banned"])) $banned = 1;
        else $banned=0; 

        $data = array($merkintaID,$kayttajaID,$lajiID,$päiväys,$intentsiteeti,$kommentti);

        if(editMerkinta($data)) {
            $message = "Muokkaus on tehty";

        } else {
            $message = "Muokkaus ei onnistunut";  
        }
    } else { 
        $message = "Lomakkeelta puuttuu tietoja";         
    }
    $merkinnat = getAllmerkinnat();
    require "./views/admin.view.php";
}


function postaddmerkintäcontroller()
{
    if(isset($_POST["lajiID"],$_POST["päiväys"],$_POST["Intentsiteeti"],$_POST["Kommentti"])) {
        
        $kayttajaID = $_SESSION["id"];
        $lajiID = sanit($_POST["lajiID"]);
        $päiväys = sanit($_POST["päiväys"]);
        $Intentsiteeti = sanit($_POST["Intentsiteeti"]);
        $Kommentti = sanit($_POST["Kommentti"]);
      

        $data = array($kayttajaID,$lajiID,$päiväys,$Intentsiteeti,$Kommentti);
//var_dump($data);
        if(addmerkinta($data)) {
            $message = "Merkintä lisätty";

        } else {
            $message = "lisääminen ei onnistu";  
        }
    } else { 
        $message = "Lomakkeelta puuttuu tietoja";         
    }
    $merkinnat = getAllmerkintäbykayttaja();
    require "./views/admin.view.php";
}
?>