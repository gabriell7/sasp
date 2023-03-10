<?php
session_start(); //aloittaa istunnon
//pyynnöt ovat muotoa index.php?action=edit&id=5

if(isset($_GET["action"])) $action = $_GET["action"];
else $action = "index";//mitä tehdään

$method = strtolower($_SERVER["REQUEST_METHOD"]); //onko post vai get
//otetaan kirjastot käyttöön
require "./controllers/kayttajakontroller.php";
require "./helpers/auth.php";

switch($action) {

    case "index":
    indexcontroller(); //funktio, joka hakee etusivun tarvitsemat asiat
    break;

    case "register":
    if($method=="get")
    require "./views/registerform.view.php";
    else postregistercontroller();
    break; 

    case "login":
    if($method =="get")
    require "./views/loginform.view.php";
    else postlogincontroller();
    break;

    case "lisaa merkinta":
    if($method =="get")
    require "./views/lisaamerkintaform.view.php";
    else postlisaamerkintacontroller();
    break;

    case "admin":
    if(islogged()) {
        admincontroller();
    } else require "./views/loginform.view.php";
    break;

    case "logout":
    if(islogged()) {
        logoutcontroller();
    } else indexcontroller();
    break;



    case "deletemerkinta":
        if(islogged()) {
            deletemerkintacontroller();
        } else require "./views/loginform.view.php";
        break;

    case "addmerkinta":
    if(islogged()) {
        if($method == "get") {
            getaddmerkintärcontroller();
        }
        else postaddmerkintäcontroller();
    } else require "./views/loginform.view.php";
    break;

    case "addmerkinta2":
        if(islogged()) {
            if($method == "get") {
                getaddmerkintärcontroller();
            }
            else postaddmerkintäcontroller();
        } else require "./views/loginform.view.php";
        break;
    
        case "editmerkinta":
            if(islogged()) {
                if($method == "get") {
                    geteditmerkintärcontroller();
                }
                else posteditmerkintäcontroller();
            } else require "./views/loginform.view.php";
            break;

    default:
    echo "404";
}