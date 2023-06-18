<?php

namespace app\Controllers;

use app\models\Festival;

class FestivalController extends BaseController
{
    /**
     * @return Festival
     */
    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Festival();
        }
        return static::$model;
    }


    public static function indexAction()
    {
        // Modele ( Les donnees) les Festivals
        $festivals = static::getModel()->latest();

        // View (afficher les données)
        static::view("festival", $festivals);
    }

    public static function createAction()
    {
        static::view('createFestival');
    }

    public static function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setDate($_POST['date'])
                ->setNom($_POST['nom'])
                ->setLocalisation($_POST['localisation'])
                ->setPhoto($_POST['photo'])
                ->create();
         
                static::redirect('festival');
          
        }
    }

    public static function editAction()
    {
        static::view('edit', self::getModel()::view($_GET['id_festival']));
    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updated = static::getModel()
                ->setDate($_POST['date'])
                ->setNom($_POST['nom'])
                ->setLocalisation($_POST['localisation'])
                ->setPhoto($_POST['photo'])
                
                ->update($_POST['id_festival']);
            if ($updated === true) {
                static::redirect('festival');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function destroyAction2()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $deleted = static::getModel()
                ->destroy($_GET['id_festival']);
           
                static::redirect('festival');
            } 
        }
    }
