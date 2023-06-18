<?php

namespace app\Controllers;

use app\models\Utilisateur;

class UtilisateurController extends BaseController
{
    /**
     * @return Utilisateur
     */
    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Utilisateur();
        }
        return static::$model;
    }


    public static function indexAction()
    {
        // Modele ( Les donnees) les Utilisateur
        $utilisateurs = static::getModel()->latest();

        // View (afficher les données)
        static::view("utilisateur", $utilisateurs);
    }

    public static function createAction()
    {
        static::view('createUtilisateur');
    }

    public static function storeAction4()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setLogin($_POST['login'])
                ->setMdp($_POST['mdp'])
                ->setRole($_POST['role'])
                ->create();
            
                static::redirect('utilisateur');
           
        }
    }

    public static function editAction()
    {
        static::view('editUtilisateur', self::getModel()::view($_GET['id_utilis']));
    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updated = static::getModel()
                ->setLogin($_POST['login'])
                ->setMdp($_POST['mdp'])
                ->setRole($_POST['role'])
                ->update($_POST['id_utilis']);
           
                static::redirect('utilisateur');
           
        }
    }

    public static function destroyAction5()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $deleted = static::getModel()
                ->destroy($_GET['id_utilis']);
           
                static::redirect('utilisateur');
           
        }
    }
}