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
        static::view('create');
    }

    public static function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setLogin($_POST['login'])
                ->setMdp($_POST['mdp'])
                ->setRole($_POST['role'])
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
                ->setLogin($_POST['login'])
                ->setMdp($_POST['mdp'])
                ->setRole($_POST['role'])
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