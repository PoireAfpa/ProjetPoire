<?php

namespace App\model;

class User extends Model
{

// déclarer les propriétés
private $idUser;
private $loginUser;
private $passUser;

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

    /**
     * @param mixed $passUser
     */
    public function setPassUser($passUser): void
    {
        $this->passUser = $passUser;
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

}
