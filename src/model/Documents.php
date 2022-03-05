<?php

namespace App\model;

use App\core\Dao;
use App\core\Model;

class Documents extends Model
{

// déclarer les propriétés
private $idDoc;
private $idContact;
private $titre;
private $resume;
private $dateEdition;

    /**
     * @return mixed
     */
    public function getIdDoc()
    {
        return $this->idDoc;
    }

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->idContact;
    }

    /**
     * @param mixed $idContact
     */
    public function setIdContact($idContact): void
    {
        $this->idContact = $idContact;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return mixed
     */
    public function getDateEdition()
    {
        return $this->dateEdition;
    }

    /**
     * @param mixed $dateEdition
     */
    public function setDateEdition($dateEdition): void
    {
        $this->dateEdition = $dateEdition;
    }

    public function getAll()
    {
        $documents = Dao::getMany(self::class);
        return $documents;
    }

    public function getOneById(int $idDoc) : ?Documents
    {
        $document = Dao::getOne(self::class,
            [
                'idDoc' => $idDoc
            ]);
        if ($document == false)
        {
            $document = null;
        }
        return $document;
    }

    public function insert()
    {
        Dao::insertOne($this,  get_object_vars($this));
    }

}