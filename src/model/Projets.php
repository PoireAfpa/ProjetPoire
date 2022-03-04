<?php

namespace App\model;

use App\core\Dao;
use App\core\Model;

class Projet extends Model
{

// déclarer les propriétés
private $codeProjet;
private $abregeProjet;
private $nomProjet;
private $typeProjet;

/**
     * @return mixed
     */
    public function getCodeProjet()
    {
        return $this->codeProjet;
    }

    /**
     * @return mixed
     */
    public function getAbregeProjet()
    {
        return $this->abregeProjet;
    }

    /**
     * @param mixed $abregeProjet
     */
    public function setAbregeProjet($abregeProjet): void
    {
        $this->abregeProjet = $abregeProjet;
    }

    /**
     * @return mixed
     */
    public function getNomProjet()
    {
        return $this->nomProjet;
    }

    /**
     * @param mixed $nomProjet
     */
    public function setNomProjet($nomProjet): void
    {
        $this->nomProjet = $nomProjet;
    }

    /**
     * @return mixed
     */
    public function getTypeProjet()
    {
        return $this->typeProjet;
    }

    /**
     * @param mixed $typeProjet
     */
    public function setTypeProjet($typeProjet): void
    {
        $this->typeProjet = $typeProjet;
    }

    public function getAll()
    {
        $projets = Dao::getMany(self::class);
        return $projets;
    }

    public function getOneById(int $codeProjet)
    {
        $projet = Dao::getOne(self::class,
            [
                'codeProjet' => $codeProjet
            ]);
        return $projet;
    }

}