<?php
require_once 'vendor/autoload.php';

use app\Controllers\VoitureController;
use app\Controllers\FestivalController;
use app\Controllers\FestivalierController;
use app\Controllers\VehiculeController;
use app\Controllers\UtilisateurController;
use app\Controllers\Authentification_loginController;
use app\Controllers\Authentification_registerController;
use app\Controllers\IndexController;



if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'list':
            VoitureController::indexAction();
            break;
        case 'festival':
            FestivalController::indexAction();
                break;
        case 'festivalier':
            FestivalierController::indexAction();
                        break;
        case 'vehicule':
            VehiculeController::indexAction();
                     break;
        case 'utilisateur':
            UtilisateurController::indexAction();
                                 break;
         case 'create':
            VoitureController::createAction();
            break;
        case 'store':
            VoitureController::storeAction();
            break;
        case 'edit':
            VoitureController::editAction();
            break;
        case 'update':
            VoitureController::updateAction();
            break;
        case 'destroy':
            VoitureController::destroyAction();
            break;
        case 'authentication-login':
        Authentification_loginController::indexAction();
                break;
        case 'authentication-register':
        Authentification_registerController::indexAction();
            break;
        case 'index':
        IndexController::indexAction();
            break;


        default:


            break;
    }
}{
    IndexController::indexAction();
}