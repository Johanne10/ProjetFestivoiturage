<?php

namespace app\models;
use PDO;

class Model
{
    protected $id;
    protected static $db;

     public function getId()
     {
         return $this->id;
     }

     public function getId_festival()
     {
         return $this->id_festival;
     }
     public function getId_festivalier()
     {
         return $this->id_festivalier;
     }
     public function getId_vehicule_festival()
     {
         return $this->id_vehicule_festival;
     }
     public function getId_utilis()
     {
         return $this->id_utilis;
     }



    /**
     * @return PDO
     */
    public static function database()
    {
        if (is_null(static::$db)) {
            static::$db = new PDO('mysql:dbname=festivoiturage;host=localhost', "root", "");
        }
        return static::$db;
    }
}