<?php

namespace app\models;

use PDO;

class Vehicule extends Model {
    private $type;
    private $place;
    private $datealler;
    
    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Vehicule
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlace() {
        return $this->place;
    }

    /**
     * @param mixed $place
     * @return Vehicule
     */
    public function setPlace($place) {
        $this->place = $place;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getDatealler() {
        return $this->datealler;
    }

    /**
     * @param mixed $datealler
     * @return Vehicule
     */
    public function setDatealler($datealler) {
        $this->datealler = $datealler;
        return $this;
    }

    
    public function latest() {
        return static::database()->query('SELECT * FROM vehicule order by id_vehicule_festival DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create() {
        $sqlState = static::database()->prepare("INSERT INTO vehicule VALUES(null,?,?,?)");
        return $sqlState->execute([
            $this->type,
            $this->place,
            $this->datealler
        ]);
    }

    public static function view($id_vehicule_festival) {
        $sqlState = static::database()->prepare("SELECT * FROM vehicule WHERE id_vehicule_festival = ?");
        $sqlState->execute([
            $id_vehicule_festival
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id_vehicule_festival) {
        $sqlState = static::database()->prepare("
            UPDATE vehicule
            SET 
                type = ?,
                place   = ?,
                datealler   = ?
            WHERE id_vehicule_festival = ?
        ");
        return $sqlState->execute([
            $this->type,
            $this->place,
            $this->datealler,
           $id_vehicule_festival
        ]);
    }

    public function destroy($id_vehicule_festival) {
        $sqlState = self::database()->prepare("DELETE FROM vehicule WHERE id_vehicule_festival = ?");
        return $sqlState->execute([$id_vehicule_festival]);
    }
}

?>