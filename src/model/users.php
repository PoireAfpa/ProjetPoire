<?php

namespace App\view\model;
use App\core\Dao;
use App\core\Model;


class User extends Model{

private $id;
private $email;
private $password;
private $role;



/**
 * Get the value of id
 */
public function getId()
{
return $this->id;
}


/**
 * Get the value of email
 */
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 */
public function setEmail($email):void
{
$this->email = $email;


}

/**
 * Get the value of password
 */
public function getPassword()
{
return $this->password;
}
public function beforeInsertInSession()
{
    unset($this->password);
}

public function setPassword(string $password): void
{
    if (strlen($password) <6 )
    {
        throw new \Exception("Le mot de passe est trop court");
    }
    $this->password = password_hash($password, PASSWORD_BCRYPT);
}

public function getOneByMail($email):?User  {
 $user=Dao::getOne(self::class, ["email"=>$email]);
 if ($user==false){
    $user=null;
   
}

return $user;
}

public function insert(){
    Dao::insertOne($this,get_object_vars($this));
    
}

/**
 * Get the value of role
 */
public function getRole()
{
return $this->role;
}
}