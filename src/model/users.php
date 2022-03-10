<?php

namespace App\model;

use App\core\Dao;
use App\core\Model;

class Users extends Model
{

// déclarer les propriétés
private $iduser;
private $loginuser;
private $passuser;
private $role;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->iduser;
    }

    /**
     * @return mixed
     */
    public function getLoginUser()
    {
        return $this->loginuser;
    }

    /**
     * @param mixed $username
     */
    public function setLoginUser($loginuser): void
    {
        $this->loginuser = $loginuser;
    }

    /**
     * @return mixed
     */
    public function getPassUser()
    {
        return $this->passuser;
    }

    public function beforeInsertInSession()
    {
        unset($this->passuser);
    }

    /**
     * @param mixed $passuser
     */
    public function setPassUser(string $passuser): void
    {
        if (strlen($passuser) <6 )
        {
            throw new \Exception("Le mot de passe est trop court");
        }
        $this->passuser = password_hash($passuser, PASSWORD_BCRYPT);
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

    public function getOneById(int $iduser) : ?Users
    {
        $user = Dao::getOne(self::class,
            [
                'iduser' => $iduser
            ]);
        if ($user == false)
        {
            $user = null;
        }
        return $user;
    }

    public function insert()
    {
        Dao::insertOne($this,  get_object_vars($this));
    }
    public function getOneByLogin($loginuser):?Users  {
        $user=Dao::getOne(self::class, ["loginuser"=>$loginuser]);
        if ($user==false){
          
           $user=null;
          
       }
       
       return $user;
       }
   public function edit($args){
    Dao::edit(self::class,  $args, [
        "iduser"=>$this->iduser
    ]);

   }

   public function delete() 
   {
       Dao::delete(self::class,['iduser' => $this->iduser]);
   }
  
}