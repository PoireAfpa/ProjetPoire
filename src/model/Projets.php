<?php

namespace App\model;

use App\core\Dao;
use App\core\Model;

class projets extends Model
{

// déclarer les propriétés
private $codeprojet;
private $abregeprojet;
private $nomprojet;
private $typeprojet;

/**
     * @return mixed
     */
    public function getCodeProjet()
    {
        return $this->codeprojet;
    }

    /**
     * @return mixed
     */
    public function getAbregeProjet()
    {
        return $this->abregeprojet;
    }

    /**
     * @param mixed $abregeprojet
     */
    public function setAbregeProjet($abregeprojet): void
    {
        $this->abregeprojet = $abregeprojet;
    }

    /**
     * @return mixed
     */
    public function getNomProjet()
    {
        return $this->nomprojet;
    }

    /**
     * @param mixed $nomprojet
     */
    public function setNomProjet($nomprojet): void
    {
        $this->nomprojet = $nomprojet;
    }

    /**
     * @return mixed
     */
    public function getTypeProjet()
    {
        return $this->typeprojet;
    }

    /**
     * @param mixed $typeprojet
     */
    public function setTypeProjet($typeprojet): void
    {
        $this->typeprojet = $typeprojet;
    }

    public function getAll()
    {
        $projets = Dao::getMany(self::class);
        return $projets;
    }

    public function getOneById(int $codeprojet) : ?projets
    {
        $projet = Dao::getOne(self::class,
            [
                'codeprojet' => $codeprojet
            ]);
        if ($projet == false)
        {
            $projet = null;
        }
        return $projet;
    }

    public function insert()
    {
        Dao::insertOne($this,  get_object_vars($this));
    }

    public function edit($args){
        Dao::edit(self::class,  $args, [
            "codeprojet"=>$this->codeprojet
        ]);
       }

    public function delete(int $codeprojet)
       {
           Dao::delete(self::class, ['codeprojet' => $codeprojet]);
       }

}