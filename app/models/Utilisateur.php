<?php

namespace app\models;

use PDO;

class Utilisateur extends Model
{
    private $login;
    private $mdp;
    private $role;
    
    public function authenticate($email, $password)
    {
        // Query the database to check if the user exists and the password is correct
        $stmt = static::database()->prepare('SELECT * FROM utilisateur WHERE `login` = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // If the user exists and the password is correct
        if ($user && ($password== $user['mdp'])) {
            // Return the user's ID
            return $user;
        } else {
            // If the user does not exist or the password is incorrect, return false
            return false;
        }
    }

   
   
    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     * @return Utilisateur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return Utilisateur
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    
    public function latest()
    {
        return static::database()->query('SELECT * FROM utilisateur order by id_utilis DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO utilisateur VALUES(null,?,?,?)");
        return $sqlState->execute([
            $this->login,
            $this->mdp,
            $this->role
        ]);
    }

    public static function view($id_utilis)
    {
        $sqlState = static::database()->prepare("SELECT * FROM utilisateur WHERE id_utilis = ?");
        $sqlState->execute([
            $id_utilis
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id_utilis)
    {
        $sqlState = static::database()->prepare("
            UPDATE utilisateur
            SET 
                login = ?,
                mdp   = ?,
                role   = ?
            WHERE id_utilis = ?
        ");
        return $sqlState->execute([
            $this->login,
            $this->mdp,
            $this->role,
           $id_utilis
        ]);
    }

    public function destroy($id_utilis)
    {
        $sqlState = self::database()->prepare("DELETE FROM utilisateur WHERE id_utilis = ?");
        return $sqlState->execute([$id_utilis]);
    }
}