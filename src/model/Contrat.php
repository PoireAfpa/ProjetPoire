<?php

namespace App\model;

use App\core\Dao;
use App\core\Model;

class Contrat extends Model
{

// déclarer les propriétés
private $idContrat;
private $idUser;
private $contrat;
private $status;
private $comment;

    /**
     * @return mixed
     */
    public function getIdContrat()
    {
        return $this->idContrat;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getContrat()
    {
        return $this->contrat;
    }

    /**
     * @param mixed $contrat
     */
    public function setContrat($contrat): void
    {
        $this->contrat = $contrat;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    public function getAll()
    {
        $contrats = Dao::getMany(self::class);
        return $contrats;
    }

    public function getOneById(int $idContrat) : ?Contrat
    {
        $contrat = Dao::getOne(self::class,
            [
                'idContrat' => $idContrat
            ]);
        if ($contrat == false)
        {
            $contrat = null;
        }
        return $contrat;
    }

    public function insert()
    {
        Dao::insertOne($this,  get_object_vars($this));
    }

}