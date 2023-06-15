<?php
namespace app\Controllers;
use app\models\Utilisateur;

class UtilisateurController extends BaseController{
    /**
     * @retrun Utilisateur
     */
    public static function getModel(){
        if(is_null(static::$model)){
            static::model = new Utlisateur();
        }
        return static::$model;
    }

    public static function indexAction(){
        //Modele (les donnees) les Utilisateurs
        $utilisateur = static::getModel()->latest();
        //View (afficher les donnes)
        static::view("list",utilisateurs)
    }

    public static function createAction(){
        static::view('create');
    }

    public static function storeAction(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $create = static::getModel()
                ->setLogin($_POST['login'])
                ->setMdp($_POST['mdp'])
                ->setRole($_POST['role'])
                ->create();
            if($create === true){
                static::redirect('list')
            }else{ echo "Erreur";}
        }

        public static function editAction(){
            static::view('edit',self::getModel()::view($_GET['id']));
        }

        public static function updateAction(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $update = static::getModel()
                    ->setLogin($_POST['login'])
                    ->setMdp($_POST['mdp'])
                    ->setRole($_POST['role'])
                    ->update($_POST['id']);
                if($updated === true){
                    static::redirect('list');
                }else{ echo "Erreur";}
            }
        }

        public static function destroyAction(){
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $deleted = static::getModel()
                    ->destroy($_GET['id'])
                if($deleted === true){
                    static::redirect('list');
                }else{ echo "Erreur";}
            }
        }
    }
}