<?php
namespace app\Controllers;
use app\models\Vehicule;

class VehiculeController extends BaseController{
    /**
     * @return Vehicule
     */
    public static function getModel(){
        if(is_null(static::$model)){
            static::$model = new Vehicule();
        }
        return static::$model;
    }

    public static function indexAction(){
        //Modele (les donnes) les Vehicules
        $vehicules = static::getModel()->latest();
        //View (afficher les donnees)
        static::view("list", $vehicules);
    }

    public static function createAction(){
        static::view('create');
    }

    public static function storeAction(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $create = static::getModel()
                ->setType($_POST['type'])
                ->setPlace($_POST['place'])
                ->setDatealler($_POST['date-aller'])
                ->create();
            if($created === true){
                static::redirect('list');
            }else{ echo "Erreur";}
        }

        public static function editAction(){
            static::view('edit', self::getModel()::view($_GET['id']))
        }

        public static function updateAction(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $updated = static::getModel()
                    ->setType($_POST['type'])
                    ->setPlace($_POST['place'])
                    ->setDatealler($_POST['date-aller'])
                    ->update($_POST['id'])
                if($updated === true){
                    static::redirect('list');
                }else{ echo "Erreur";}
            }
        }

        public static funtion destroyAction(){
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $deleted = static::getModel()
                    ->destroy($_GET['GET']);
                if($deleted === true){
                    static::redirect('list');
                }else{ echo "Erreur";}
            }
        }
    }
}