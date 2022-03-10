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
    private $idContact;
    private $idClient;
    private $idFonc;
    private $nomContact;
    private $prenomContact;
    private $telContact;
    private $emailContact;
    private $photo;
    private $duree;

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->idContact;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient): void
    {
        $this->idClient = $idClient;
    }

    /**
     * @return mixed
     */
    public function getIdFonc()
    {
        return $this->idFonc;
    }

    /**
     * @param mixed $idFonc
     */
    public function setIdFonc($idFonc): void
    {
        $this->idFonc = $idFonc;
    }

    /**
     * @return mixed
     */
    public function getNomContact()
    {
        return $this->nomContact;
    }

    /**
     * @param mixed $nomContact
     */
    public function setNomContact($nomContact): void
    {
        $this->nomContact = $nomContact;
    }

    /**
     * @return mixed
     */
    public function getPrenomContact()
    {
        return $this->prenomContact;
    }

    /**
     * @param mixed $prenomContact
     */
    public function setPrenomContact($prenomContact): void
    {
        $this->prenomContact = $prenomContact;
    }

    /**
     * @return mixed
     */
    public function getTelContact()
    {
        return $this->telContact;
    }

    /**
     * @param mixed $telContact
     */
    public function setTelContact($telContact): void
    {
        $this->telContact = $telContact;
    }

    /**
     * @return mixed
     */
    public function getEmailContact()
    {
        return $this->emailContact;
    }

    /**
     * @param mixed $emailContact
     */
    public function setEmailContact($emailContact): void
    {
        $this->emailContact = $emailContact;
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

    public function getOneById(int $idContact) : ?Contacts
    {
        $contact = Dao::getOne(self::class,
            [
                'idContact' => $idContact
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

    public function delete(int $idContact)
    {
        Dao::delete(self::class, ['idContact' => $idContact]);
    }
    public function edit($args){
        Dao::edit(self::class,  $args, [
            "idcontact"=>$this->idContact
        ]);
    
       }
}