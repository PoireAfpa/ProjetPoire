<?php

namespace App\model;

use App\core\Dao;
use App\core\Model;

class User extends Model
{

// déclarer les propriétés
private $idUser;
private $loginUser;
private $passUser;
private $role;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @return mixed
     */
    public function getLoginUser()
    {
        return $this->loginUser;
    }

    /**
     * @param mixed $username
     */
    public function setLoginUser($loginUser): void
    {
        $this->loginUser = $loginUser;
    }

    /**
     * @return mixed
     */
    public function getPassUser()
    {
        return $this->passUser;
    }

    public function beforeInsertInSession()
    {
        unset($this->passUser);
    }

    /**
     * @param mixed $passUser
     */
    public function setPassUser(string $passUser): void
    {
        if (strlen($passUser) <6 )
        {
            throw new \Exception("Le mot de passe est trop court");
        }
        $this->passUser = password_hash($passUser, PASSWORD_BCRYPT);
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
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function getAll()
    {

        $users = Dao::getMany(self::class);
        return $users;
    }

    public function getOneById(int $idUser)
    {

        $user = Dao::getOne(self::class,
            [
                'idUser' => $idUser
            ]);
        return $user;
    }

    /* 
    public function insert(){
        Dao::insertOne($this,get_object_vars($this));
    }
    */

}
