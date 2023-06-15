<?php

namespace app\models;

use PDO;

class Festivalier extends Model {
    private $nom_festivalier;
    private $prenom;
    private $date_de_presence;
    private $pseudo;
    private $mot_de_passe;


    /**
     * @return mixed
     */
    public function getNom_festivalier() {
        return $this->getNom_festivalier;
    }

    /**
     * @param mixed $nom_festivalier
     * @return Festivalier
     */
    public function setDate($nom_festivalier) {
        $this->date = $nom_festivalier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Festivalier
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getDate_de_presence() {
        return $this->date_de_presence;
    }

    /**
     * @param mixed $date_de_presence
     * @return Festivalier
     */
    public function setDate_de_presence($date_de_presence) {
        $this->localisation = $date_de_presence;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPseudo() {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     * @return Festivalier
     */
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getMot_de_passe() {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     * @return Festivalier
     */
    public function setMot_de_passe($mot_de_passe) {
        $this->mot_de_passe = $mot_de_passe;
        return $this;
    }


    public function latest() {
        return static::database()->query('SELECT * FROM festivalier order by id_festivalier DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create() {
        $sqlState = static::database()->prepare("INSERT INTO festivalier VALUES(null,?,?,?,?,?)");
        return $sqlState->execute([
            $this->nom_festivalier,
            $this->prenom,
            $this->date_de_presence,
            $this->pseudo,
            $this->mot_de_passe,

        ]);
    }

    public static function view($id_festivalier) {
        $sqlState = static::database()->prepare("SELECT * FROM festivalier WHERE id_festivalier = ?");
        $sqlState->execute([
            $id_festivalier
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id_festivalier) {
        $sqlState = static::database()->prepare("
            UPDATE festivalier
            SET 
                nom_festivalier = ?,
                prenom   = ?,
                date_de_presence   = ?,
                pseudo   = ?,
                mot_de_passe   = ?
            WHERE id_festivalier = ?
        ");
        return $sqlState->execute([
            $this->nom_festivalier,
            $this->prenom,
            $this->date_de_presence,
            $this->pseudo,
            $this->mot_de_passe,
            $id_festivalier
        ]);
    }

    public function destroy($id_festivalier) {
        $sqlState = self::database()->prepare("DELETE FROM festival WHERE id_festivalier = ?");
        return $sqlState->execute([$id_festivalier]);
    }
}

?>