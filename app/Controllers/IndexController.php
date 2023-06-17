<?php

namespace app\Controllers;


class IndexController extends BaseController{

    public static function indexAction()
    {


        // View (afficher les données)
                static::view("index");
    } 
}
?>