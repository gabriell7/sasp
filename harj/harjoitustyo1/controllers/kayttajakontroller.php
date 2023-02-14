<?php
require "./database/models/kayttaja.php";
require "./helpers/helper.php";

function indexcontroller()
{
    $elokuvat = getAllelokuvat();
    //var_dump($players);
    require "./views/index.view.php";
}


function admincontroller()
{
    $arvostelut = getAllarvostelubyarvostelija();
    $arvostelut = getAllKayttajat();
    //var_dump($players);
    require "./views/admin.view.php";
}

function postregistercontroller()
{
    if(isset($_POST["kayttajatunnus"],$_POST["password"],$_POST["email"]))   {
       // echo "Formi perillä";
        $nickname = sanit($_POST["kayttajatunnus"]);
        $password = sanitpassword($_POST["password"]);
        $email = sanit($_POST["email"]);
       
        $data = array($nickname,$password,$email);

       

        $ok = addArvostejia($data); 

        if($ok) {
            $message = "Rekisteröinti onnistui";
            $elokuvat = getAllelokuvat(); //hakee kaikki pelaajat kannasta
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
           $arvostelija =getarvostelijaByNickname($nickname);
           $id = $arvostelija[0]["arvostelijaID"];
           $ip = $_SERVER["REMOTE_ADDR"];

           //asetetaan istuntomuuttujan arvot

           $_SESSION["id"] = $id;
           $_SESSION["ip"] = $ip;

           $arvostelut = getAllarvostelubyarvostelija();
           $arvostelut = getAllKayttajat();
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


function getaddarvostelurcontroller()
{
    $elokuvat = getAllelokuvat();
   // var_dump ($elokuvat);
    require "./views/addarvosteluform.view.php";

}


function deletearvostelucontroller()
{
    if(isset($_GET["arvostelu"])) {
        $arvostelijaID = $_GET["arvostelu"];
        if(deletearvostelu($arvostelijaID)) $message="Pelaaja on poistettu";
        else $message="Pelaaja ei poistunut";
        $arvostelut = getAllarvostelubyarvostelija();
        $arvostelut = getAllKayttajat();
        require "./views/admin.view.php";
    } else header("Location:./index.php?action=admin");
  //  $arvostelut = getAllarvostelubyarvostelija();
    //    $message = "ei poistettavaa id:tä";
      //  require "./views/admin.view.php";
    }

// hakee id:n mukaan pelaajan tiedot kannasta ja antaa ne muokkauslomakkeelle
function geteditarvostelucontroller()
{
    if(isset($_GET["arvosteluID"])) {
        $arvosteluID=$_GET["arvosteluID"];
        $arvostelija = getarvostelijaById($arvosteluID);
        //var_dump($arvostelu);
        require "./views/editkaytajaform.view.php";
    } else {
        $message="Ei valittuna pelaajaa";
        $arvostelut = getAllKayttajat();
        require "./admin.view.php";
    }
}

function posteditarvostelucontroller()
{
    if(isset($_POST["arvosteluID"],$_POST["otsikko"],$_POST["kokonaisarvio"],$_POST["elokuvaID"])) {
        $arvosteluID = $_POST["arvosteluID"];
        $otsikko = sanit($_POST["otsikko"]);
        $kokonaisarvio = sanit($_POST["kokonaisarvio"]);
        $elokuvaID = sanit($_POST["elokuvaID"]);
        if(isset($_POST["banned"])) $banned = 1;
        else $banned=0; 

        $data = array($otsikko,$kokonaisarvio,$elokuvaID,$banned,$arvosteluID);

        if(editarvostelu($data)) {
            $message = "Muokkaus on tehty";

        } else {
            $message = "Muokkaus ei onnistunut";  
        }
    } else { 
        $message = "Lomakkeelta puuttuu tietoja";         
    }
    $arvostelut = getAllarvostelu();
    require "./views/admin.view.php";
}


function postaddarvostelutcontroller()
{
    if(isset($_POST["arvostelu"],$_POST["otsikko"],$_POST["kokonaisarvio"],$_POST["elokuvaID"])) {
        
        $arvostelijaID = $_SESSION["id"];
        $otsikko = sanit($_POST["otsikko"]);
        $kokonaisarvio = sanit($_POST["kokonaisarvio"]);
        $elokuvaID = sanit($_POST["elokuvaID"]);
        $arvostelu = sanit($_POST["arvostelu"]);
        $kirjoitettu = date("Y-m-d");
      

        $data = array($arvostelu,$otsikko,$kokonaisarvio,$elokuvaID,$arvostelijaID,$kirjoitettu);
//var_dump($data);
        if(addarvostelu($data)) {
            $message = "Merkintä lisätty";

        } else {
            $message = "lisääminen ei onnistu";  
        }
    } else { 
        $message = "Lomakkeelta puuttuu tietoja";         
    }
    $arvostelut = getAllarvostelubyarvostelija();
    $arvostelut = getAllKayttajat();
    require "./views/admin.view.php";
}
?>