<?php

declare(strict_types=1);

namespace App\model;

use App\core\Dao;
use App\core\Model;

/**
 * Class Clients
 * @package App\model
 * @author Houssem TAYECH <houssem@forticas.com>
 */
class Clients extends Model
{
    private int $idclient;
    private int $idsect;
    private string $raisonsociale;
    private string $adresseclient;
    private string $codepostal;
    private string $villeclient;
    private int $ca;
    private int $effectif;
    private string $telephoneclient;
    private string $typeclient;
    private string $natureclient;
    private string $commentaireclient;


    /**
     * Get the value of idclient
     */ 
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Get the value of idsect
     */ 
    public function getIdsect()
    {
        return $this->idsect;
    }

        /**
     * Set the value of idsect
     *
     * @return  self
     */ 
    public function setIdsect($idsect)
    {
        $this->idsect = $idsect;

        return $this;
    }

    /**
     * Get the value of raisonsociale
     */ 
    public function getRaisonsociale()
    {
        return $this->raisonsociale;
    }

    /**
     * Set the value of raisonsociale
     *
     * @return  self
     */ 
    public function setRaisonsociale($raisonsociale)
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    /**
     * Get the value of adresseclient
     */ 
    public function getAdresseclient()
    {
        return $this->adresseclient;
    }

    /**
     * Set the value of adresseclient
     *
     * @return  self
     */ 
    public function setAdresseclient($adresseclient)
    {
        $this->adresseclient = $adresseclient;

        return $this;
    }

    /**
     * Get the value of codepostal
     */ 
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set the value of codepostal
     *
     * @return  self
     */ 
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get the value of villeclient
     */ 
    public function getVilleclient()
    {
        return $this->villeclient;
    }

    /**
     * Set the value of villeclient
     *
     * @return  self
     */ 
    public function setVilleclient($villeclient)
    {
        $this->villeclient = $villeclient;

        return $this;
    }

    /**
     * Get the value of ca
     */ 
    public function getCa()
    {
        return $this->ca;
    }

    /**
     * Set the value of ca
     *
     * @return  self
     */ 
    public function setCa($ca)
    {
        $this->ca = $ca;

        return $this;
    }

    /**
     * Get the value of effectif
     */ 
    public function getEffectif()
    {
        return $this->effectif;
    }

    /**
     * Set the value of effectif
     *
     * @return  self
     */ 
    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;

        return $this;
    }

    /**
     * Get the value of telephoneclient
     */ 
    public function getTelephoneclient()
    {
        return $this->telephoneclient;
    }

    /**
     * Set the value of telephoneclient
     *
     * @return  self
     */ 
    public function setTelephoneclient($telephoneclient)
    {
        $this->telephoneclient = $telephoneclient;

        return $this;
    }

    /**
     * Get the value of typeclient
     */ 
    public function getTypeclient()
    {
        return $this->typeclient;
    }

    /**
     * Set the value of typeclient
     *
     * @return  self
     */ 
    public function setTypeclient($typeclient)
    {
        $this->typeclient = $typeclient;

        return $this;
    }

    /**
     * Get the value of natureclient
     */ 
    public function getNatureclient()
    {
        return $this->natureclient;
    }

    /**
     * Set the value of natureclient
     *
     * @return  self
     */ 
    public function setNatureclient($natureclient)
    {
        $this->natureclient = $natureclient;

        return $this;
    }

    /**
     * Get the value of commentaireclient
     */ 
    public function getCommentaireclient()
    {
        return $this->commentaireclient;
    }

    /**
     * Set the value of commentaireclient
     *
     * @return  self
     */ 
    public function setCommentaireclient($commentaireclient)
    {
        $this->commentaireclient = $commentaireclient;

        return $this;
    }

    public function getOneById(int $idclient) : ?Clients
    {
        $client  = Dao::getOne(self::class , ['idclient' => $idclient]);
        // le USER ou FALSE
        if ($client == false)
        {
            $client = null;
        }
        return $client;
    }

    public function getAll()
    {
        $clients = Dao::getMany (self::class);
        return $clients;
    }

    public function insert()
    {

        Dao::insertOne($this,  get_object_vars($this));
    }

    public function delete($idclient) 
    {
        Dao::delete(self::class, ['idclient' => $idclient]);
    }

    public function edit($args){
        Dao::edit(self::class,  $args, [
            "idclient"=>$this->idclient
        ]);
       }
}