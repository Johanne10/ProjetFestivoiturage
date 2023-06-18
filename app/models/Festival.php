<?php

namespace app\models;

use PDO;

class Festival extends Model
{
    // private $id_festival;
    private $date;
    private $nom;
    private $localisation;
    private $photo;



    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Festival
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Festival
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param mixed $localisation
     * @return Festival
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Festival
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    public function latest()
    {
        return static::database()->query('SELECT * FROM festival order by id_festival DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO festival VALUES(null,?,?,?,?)");
        return $sqlState->execute([
            $this->date,
            $this->nom,
            $this->localisation,
            $this->photo
        ]);
    }

    public static function view($id_festival)
    {
        $sqlState = static::database()->prepare("SELECT * FROM festival WHERE id_festival = ?");
        $sqlState->execute([
            $id_festival
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id_festival)
    {
        $sqlState = static::database()->prepare("
            UPDATE festival
            SET 
                date = ?,
                nom   = ?,
                localisation   = ?,
                photo   = ?
            WHERE id_festival = ?
        ");
        return $sqlState->execute([
            $this->date,
            $this->nom,
            $this->localisation,
            $this->photo,
           $id_festival
        ]);
    }

    public function destroy($id_festival)
    {
        $sqlState = self::database()->prepare("DELETE FROM festival WHERE id_festival = ?");
        return $sqlState->execute([$id_festival]);
    }
}
?>