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
        case 'createFestival':
                FestivalController::createAction();
                break;
        case 'createFestivalier':
                FestivalierController::createAction();
                    break;
        case 'createVehicule':
                VehiculeController::createAction();
                            break;
        case 'createUtilisateur':
                UtilisateurController::createAction();
                    break;
        case 'store':
            VoitureController::storeAction();
            break;
        case 'storeFestival':
            FestivalController::storeAction();
                break;
        case 'storeFestivalier':
            
            FestivalierController::storeAction2();
                        break;
        case 'storeVehicule':
            
            VehiculeController::storeAction3();
                 break;
        case 'storeUtilisateur':
            
                    UtilisateurController::storeAction4();
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
        case 'destroyFestival':
            FestivalController::destroyAction2();
                break;
        case 'destroyFestivalier':
            FestivalierController::destroyAction3();
                        break;
        case 'destroyVehicule':
                VehiculeController::destroyAction4();
                    break;
        case 'destroyUtilisateur':
            UtilisateurController::destroyAction5();
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