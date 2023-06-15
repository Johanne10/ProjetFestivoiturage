<?php
namespace app\Controllers;
use app\models\Festival;

class FestivalController extends BaseController{
    /**
    *@return Festival
    */
    public static function getModel(){
        if(is_null(static::$model)){
            static::$model = new Festival();
        }
        return static::$model;
    }

    public static function indexAction(){
        //Modele (les donnees) les Festivals
        $festivals = static::getModel()->latest();
        //View (afficher les donnees)
        static::view("list",$festivals);
    }

    public static function createAction(){
        static::view('create');
    }

    public static function storeAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $created = static::getModel()
                ->setDate($_POST['date'])
                ->setNom($_POST['nom'])
                ->setLocalisation($_POST['locaisation'])
                ->setPhoto($_POST['photo'])
                ->create();
             if($created == true){
                static::redirect('list');
             }else{
                echo "Erreur";
             }
        }
    }

    public static function editAction(){
        static::view('edit', self::getModel()::view($_GET['id']));
    }

    public static function updateAction(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $updated = static::getModel()
                ->setDate($_POST['date'])
                ->setNom($_POST['nom'])
                ->setLocalisation($_POST['localisation'])
                ->setPhoto($_POST['photo'])

                ->update($_POST['id']);
            if($updated === true){
                static::redirect('list');
            }else{
                echo "Erreur";
            }
        }

    public static function destroyAction(){
         if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $deleted = static::getModel()
                ->destroy($_GET['id']);
            if($deleted === true){
                static::redirect('list');
            }else{ echo "Erreur"}
        }
    }
}
}
