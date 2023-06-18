<?php

namespace app\Controllers;


class Authentification_loginController extends BaseController{

    public static function indexAction()
    {
       

        // View (afficher les données)
                static::view("authentication-login");
    } 
}


