<?php

namespace app\Controllers;

use app\models\Festivalier;

class FestivalierController extends BaseController
{
    /**
     * @return Festivalier
     */
    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Festivalier();
        }
        return static::$model;
    }


    public static function indexAction()
    {
        // Modele ( Les donnees) les Festivaliers
        $festivaliers = static::getModel()->latest();

        // View (afficher les données)
        static::view("festivalier", $festivaliers);
    }

    public static function createAction()
    {
        static::view('create');
    }

    public static function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setNom_festivalier($_POST['nom_festivalier'])
                ->setPrenom($_POST['prenom'])
                ->setDate_de_presence($_POST['date_de_presence'])
                ->setPseudo($_POST['pseudo'])
                ->setMot_de_passe($_POST['mot_de_passe'])
                ->create();
            if ($created === true) {
                static::redirect('list');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function editAction()
    {
        static::view('edit', self::getModel()::view($_GET['id']));
    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updated = static::getModel()
                ->setNom_festivalier($_POST['nom_festivalier'])
                ->setPrenom($_POST['prenom'])
                ->setDate_de_presence($_POST['date_de_presence'])
                ->setPseudo($_POST['pseudo'])
                ->setMot_de_passe($_POST['mot_de_passe'])
                
                ->update($_POST['id']);
            if ($updated === true) {
                static::redirect('list');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function destroyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $deleted = static::getModel()
                ->destroy($_GET['id']);
            if ($deleted === true) {
                static::redirect('list');
            } else {
                echo "Erreur";
            }
        }
    }
}