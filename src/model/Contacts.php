<?php

declare(strict_types=1);

namespace App\model;

use App\core\Dao;
use App\core\Model;

/**
 * Class Contacts
 * @package App\src\model
 * @author Poire Afpa <poire.afpa@gmail.com>
 */
class Contacts extends Model{
    private $idcontact;
    private $idclient;
    private $idfonc;
    private $nomcontact;
    private $prenomcontact;
    private $telcontact;
    private $emailcontact;
    private $photo;
    private $duree;

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->idcontact;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idclient;
    }

    /**
     * @param mixed $idclient
     */
    public function setIdClient($idclient): void
    {
        $this->idclient = $idclient;
    }

    /**
     * @return mixed
     */
    public function getIdFonc()
    {
        return $this->idfonc;
    }

    /**
     * @param mixed $idfonc
     */
    public function setIdFonc($idfonc): void
    {
        $this->idfonc = $idfonc;
    }

    /**
     * @return mixed
     */
    public function getNomContact()
    {
        return $this->nomcontact;
    }

    /**
     * @param mixed $nomcontact
     */
    public function setNomContact($nomcontact): void
    {
        $this->nomContact = $nomcontact;
    }

    /**
     * @return mixed
     */
    public function getPrenomContact()
    {
        return $this->prenomcontact;
    }

    /**
     * @param mixed $prenomcontact
     */
    public function setPrenomContact($prenomcontact): void
    {
        $this->prenomContact = $prenomcontact;
    }

    /**
     * @return mixed
     */
    public function getTelContact()
    {
        return $this->telcontact;
    }

    /**
     * @param mixed $telcontact
     */
    public function setTelContact($telcontact): void
    {
        $this->telContact = $telcontact;
    }

    /**
     * @return mixed
     */
    public function getEmailContact()
    {
        return $this->emailcontact;
    }

    /**
     * @param mixed $emailcontact
     */
    public function setEmailContact($emailcontact): void
    {
        $this->emailcontact = $emailcontact;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
        $this->duree = $duree;
    }

    public function getAll()
    {
        $contacts = Dao::getMany(self::class);
        return $contacts;
    }

    public function getOneById(int $idcontact) : ?Contacts
    {
        $contact = Dao::getOne(self::class,
            [
                'idcontact' => $idcontact
            ]);
        if ($contact == false)
        {
            $contact = null;
        }
        return $contact;
    }

    public function insert()
    {
        Dao::insertOne($this,  get_object_vars($this));
    }

    public function delete(int $idcontact)
    {
        Dao::delete(self::class, ['idcontact' => $idcontact]);
    }
    public function edit($args){
        Dao::edit(self::class,  $args, [
            "idcontact"=>$this->idcontact
        ]);
    
       }
}