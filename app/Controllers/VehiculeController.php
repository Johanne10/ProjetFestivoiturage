<?php

namespace app\Controllers;

use app\models\Vehicule;

class VehiculeController extends BaseController
{
    /**
     * @return Vehicule
     */
    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Vehicule();
        }
        return static::$model;
    }


    public static function indexAction()
    {
        // Modele ( Les donnees) les Vehicules
        $vehicules = static::getModel()->latest();

        // View (afficher les données)
        static::view("vehicule", $vehicules);
    }

    public static function createAction()
    {
        static::view('createVehicule');
    }

    public static function storeAction3()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setType($_POST['type'])
                ->setPlace($_POST['place'])
                ->setDatealler($_POST['datealler'])
                ->create();
            
                static::redirect('vehicule');
           
        }
    }

    public static function editAction()
    {
        static::view('editVehicule', self::getModel()::view($_GET['id_vehicule_festival']));
    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updated = static::getModel()
            ->setType($_POST['type'])
            ->setPlace($_POST['place'])
            ->setDatealler($_POST['datealler'])
                ->update($_POST['id_vehicule_festival']);
           
                static::redirect('vehicule');
           
        }
    }

    public static function destroyAction4()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $deleted = static::getModel()
                ->destroy($_GET['id_vehicule_festival']);
            
                static::redirect('vehicule');
           
        }
    }
}